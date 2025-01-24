<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class CartController extends Controller
{
    public function show(Request $request) {
        $cartData = collect($request->session()->get('cartData', []));

        return view('cart.show')->with([
            'cartData' => $cartData,
        ]);
    }
}
