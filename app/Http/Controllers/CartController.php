<?php

namespace App\Http\Controllers;

use Gloudemans\Shoppingcart\Facades\Cart;
use Illuminate\Http\Request;
use App\Models\Product;

class CartController extends Controller
{
    public function index(){

        $carts = Cart::content();
        return view('cart')->with(['carts' => $carts ]);
    }

    public function store(Request $request){

        $product = Product::findOrFail($request->product_id);

        Cart::add([
            'id' => $product->id,
            'name' => $product->title,
            'qty' => $request->quantity,
            'weight' => 0.0,
            'price' => $product->price
        ]);

        return redirect()->route('shop')->with(['message' => 'Product is Added to Cart Successfully']);
    }

    public function update(Request $request){

        Cart::update($request->rowId, $request->quantity);
        return redirect()->route('cart.index')->with('message', 'Item Cart is Updated Successfully');
    }

    public function remove(Request $request){

        Cart::remove($request->rowId);
        return redirect()->route('cart.index')->with('message', 'Item Cart Remove Successfully');;
    }
    
    public function clear(){

        Cart::destroy();
        return redirect()->route('cart.index')->with('message', 'All Item Cart Clear Successfully');
    }
}
