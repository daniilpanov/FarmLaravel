<?php

namespace App\Http\Controllers;

use App\Models\Product;

class ProductController extends Controller
{
    public function product(string $alias): ?Product
    {
        return Product::where('alias', $alias)->first();
    }
}
