<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;
use App\Models\Cart;

class CartController extends Controller
{
    public function create($id)
    {
        $cart_article = Cart::create([
            'user_id' => Auth::id(),
            'article_id' => $id,
        ]);

        return redirect()->route('crypto', $id);
    }

    public function show_cart()
    {
        $cart_article = Cart::where('user_id', Auth::id())->get();

        return view('cart', compact('cart_article'));
    }
}
