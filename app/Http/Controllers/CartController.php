<?php

namespace App\Http\Controllers;

use App\Http\Kernel;
use App\Models\Cart;
use App\Models\Message;
use App\Models\Order;
use App\Models\Product;
use App\Models\User;
use Illuminate\Contracts\Foundation\Application;
use Illuminate\Contracts\View\Factory;
use Illuminate\Contracts\View\View;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Redirect;

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
        return view('cart')
            ->with('cart_items', Cart::where('user_uuid', Kernel::$uuid)->get())
            ->with('page', $this->getPage('cart')['page']);
    }

    public function add(Request $request)
    {
        /** @var $item Cart */
        $item = Cart::create([
            'user_uuid' => $request->input('uuid'),
            'product_id' => $request->input('product_id'),
            'quantity' => $request->input('quantity'),
        ]);
        return $item->id;
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

    public function order(Request $request)
    {
        $items = $request->input('items');
        $quantities = $request->input('items-quantity');
        $data = [];

        for ($i = 0; $i < count($items); ++$i) {
            $item = Cart::find($items[$i]);
            throw_unless($item);
            $data[$item->product_id] = [$quantities[$i], $items[$i]];
        }

        return $this->current_view = \view('order')->with('data', json_encode($data));
    }

    public function buy(Request $request)
    {
        $order_data = (array)json_decode($request->input('order_data'));
        $items_for_del = [];
        $products_ids = [];

        foreach ($order_data as $id => $item_data) {
            $products_ids[] = $id;
            $items_for_del[] = $item_data[1];
        }

        Cart::whereIn('id', $items_for_del)->delete();
        $products = Product::whereIn('id', $products_ids)->get();

        $sum_price = 0;
        foreach ($products as $product) {
            $sum_price += $product->price * (int)$order_data[$product->id][0];
        }

        $model = new Order;
        foreach ($request->input() as $key => $value) {
            $model->$key = $value;
        }
        $model->order_data = $order_data;
        $model->products = $products;
        $model->sum_price = $sum_price;

        try {
            Mail::to(User::getAdmin())->queue(new \App\Mail\Order($model));
            $success = $model->save();
        } catch (\Exception) {
            $success = false;
        }

        return Redirect::action(
            CatalogController::class,
            ['success' => $success]
        );
    }
}
