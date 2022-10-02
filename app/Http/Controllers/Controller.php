<?php

namespace App\Http\Controllers;

use App\Models\Page;
use Illuminate\Foundation\Auth\Access\AuthorizesRequests;
use Illuminate\Foundation\Bus\DispatchesJobs;
use Illuminate\Foundation\Validation\ValidatesRequests;
use Illuminate\Routing\Controller as BaseController;
use Illuminate\Support\Facades\View;
use Symfony\Component\HttpKernel\Exception\NotFoundHttpException;

class Controller extends BaseController
{
    use AuthorizesRequests, DispatchesJobs, ValidatesRequests;

    /**
     * @throws NotFoundHttpException
     */
    protected function getPage($page): array
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
                NotFoundHttpException::class
            );
            throw_if(
                $data['page'] && !$data['page']->content,
                NotFoundHttpException::class
            );
        }

        return $data;
    }
}
