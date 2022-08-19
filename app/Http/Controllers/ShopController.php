<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class ShopController extends Controller
{
    public function shop(){

        $products = Product::latest()->get();
        $cart = Cart::content();
        return view('shop')->with([ 'products' => $products, 'cart' => $cart ]);
    }

    public function item(Product $product){

        $cart = Cart::content();
        $related_products = Product::where('category_id', $product->category_id)->latest()->limit(5)->get();
        // dd($related_products);
        return view('dashboard.admin.product.show')->with([ 'product' => $product, 'related_products' => $related_products, 'cart' => $cart ]);
    }
}
