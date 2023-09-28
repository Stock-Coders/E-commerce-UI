<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use Illuminate\Http\Request;

class CartController extends Controller
{
    // public function add($id)
    // {
    //     $product = Product::findOrFail($id);
    //     $cart    = Session::get('cart', []);
    //     if (array_key_exists($id, $cart)) {
    //         $cart[$id]['quantity']++;
    //     } else {
    //         $cart[$id] = [
    //             'product' => $product,
    //             'quantity' => 1,
    //         ];
    //     }
    //     Session::put('cart', $cart);

    //     return redirect()->back()->with('success', 'Product added to cart.');
    // }

}
