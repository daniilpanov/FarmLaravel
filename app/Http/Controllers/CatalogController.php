<?php

namespace App\Http\Controllers;

use App\Http\Kernel;
use App\Models\Catalog;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    /**
     * INDEX
     *
     * @return View
     * @throws \Throwable
     */
    public function __invoke(): View
    {
        return $this->current_view = view('catalog')
            ->with(
                'catalog',
                Catalog::select([
                        'alias' => 'catalogs.alias',
                        'id' => 'catalogs.id',
                        'image_id',
                        'name' => 'catalogs.name'
                    ])->where('catalogs.visible', true)
                    ->leftJoin('pages', 'page_id', '=', 'pages.id')
                    ->get()
            )->with('page', $this->getPage('catalog')['page']);
    }

    /**
     * CATEGORY (alias)
     *
     * @param string $alias
     * @return View
     * @throws \Throwable
     */
    public function category(string $alias): View
    {
        return $this->current_view = view('category')
            ->with('catalog', Catalog::where('alias', $alias)->get())
            ->with('page', $this->getPage('category')['page']);
    }
}
