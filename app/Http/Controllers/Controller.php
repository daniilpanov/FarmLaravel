<?php

namespace App\Http\Controllers;

use App\Exceptions\PageNotFoundHttpException;
use App\Models\Page;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;

class Controller extends BaseController
{
    protected ?\Illuminate\Contracts\View\View $current_view = null;

    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    public function __construct()
    {
        View::share('menu', $this->getMenu());
        View::share('___', function (string $key, ?string $default = null) {
            if (!$default) {
                $default = $key;
            }
            $data = $this->current_view?->getData();
            if (isset($data['page']) && is_object($content = $data['page']->content?->localizeData())) {
                if (in_array($key, array_keys(get_object_vars($content)))) {
                    return $content->$key;
                }
                else {
                    $res = __($key);
                    return $res == $key ? $default : $key;
                }
            }
            $res = __($key);
            return $res == $key ? $default : $key;
        });
    }

    /**
     * @throws PageNotFoundHttpException
     * @throws \Throwable
     */
    protected function getPage(string $page): array
    {
        $data = [];
        $data['page'] = Page::where('alias', $page)->where('visible', true)->first();
        $data['act'] = $act = $page . 'Page';

        if (!method_exists($this, $act)) {
            $data['act'] = $act = null;
        }

        if (View::exists($page)) {
            $data['view'] = $page;
        } else {
            $data['view'] = null;
            throw_unless(
                $data['page'] || $act,
                PageNotFoundHttpException::class
            );
            throw_if(
                $data['page'] && !$data['page']->content,
                PageNotFoundHttpException::class
            );
        }

        View::share('page_alias', $page);

        return $data;
    }

    protected function getMenu(): ?Collection
    {
        $sorted = [];
        $groups = [];
        $items = [];

        Page::select('id', 'name', 'title', 'alias', 'clickable', 'parent_id')
            ->where('visible', true)
            ->chunk(200, function ($collection) use (&$sorted, &$groups, &$items) {
                foreach ($collection as $item) {
                    $items[$item->id] = $item;
                    if ($item->parent_id) {
                        if (isset($items[$item->parent_id])) {
                            $items[$item->parent_id]->children[$item->id] = $item;
                        } else {
                            $groups[$item->parent_id][$item->id] = $item;
                        }
                    } else {
                        $sorted[$item->id] = $item;
                    }

                    if (isset($groups[$item->id])) {
                        $item->children = &$groups[$item->id];
                    }
                }
            });

        return new Collection($sorted);
    }
}
