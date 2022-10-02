<?php

namespace App\Http\Controllers;

use App\Models\Catalog;
use Illuminate\Contracts\View\View;

class CatalogController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @return View
     */
    public function __invoke()
    {
        return view('catalog')
            ->with('catalog', Catalog::all())
            ->with('page', $this->getPage('catalog')['page']);
    }

    public function category(string $alias)
    {
        return view('category')
            ->with('catalog', Catalog::where('alias', $alias)->get())
            ->with('page', $this->getPage('category')['page']);
    }
}
