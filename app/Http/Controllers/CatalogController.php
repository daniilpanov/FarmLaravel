<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CatalogController extends Controller
{
    /**
     * INDEX
     *
     * @return View
     * @throws \Throwable
     */
    public function __invoke(Request $request): View
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
            )->with('page', $this->getPage('catalog')['page'])
            ->with('data', $request->input());
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
