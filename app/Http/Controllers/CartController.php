<?php

namespace App\Http\Controllers;

use App\Http\Kernel;
use App\Models\Cart;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;

class CartController extends Controller
{
    /**
     * Handle the incoming request.
     *
     * @param Request $request
     * @return Application|Factory|View
     * @throws \Throwable
     */
    public function __invoke(Request $request): View|Factory|Application
    {
        return view('cart')->with('cart_items', Cart::all())
            ->with('page', $this->getPage('cart')['page']);
    }

    public function add(Request $request)
    {
        /** @var $item Cart */
        $item = Cart::create();
        $item->user_uuid = $request->input('uuid');
        $item->product_id = $request->input('product_id');
        $item->quantity = $request->input('quantity');
        return $item->save() ? $item->id : 0;
    }

    public function editQuantity(Request $request)
    {
        $item = Cart::findOrFail($request->input('id'));
        $item->quantity = $request->input('quantity');
        return $item->save();
    }

    public function deleteItem(Request $request)
    {
        $item = Cart::findOrFail($request->input('id'));
        return $item->delete();
    }
}
