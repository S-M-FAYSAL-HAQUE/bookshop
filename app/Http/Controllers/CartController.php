<?php

namespace App\Http\Controllers;

use App\Book;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function store(Request $request){
        $product = Book::with('authors')->find($request->id)->toArray();
        \Cart::add(array(
            'id' => $request->input('id'),
            'name' => $request->input('name'),
            'price' => $request->input('price'),
            'quantity' => $request->input('quantity'),
            'attributes' => $product
        ));
        return redirect()->back()->with('message', 'Book added to cart successfully.');

    }
    public function getCart(){
       //dd(\Cart::getContent());
        return view('frontend.pages.cart');
    }

    public function removeItem($id)
    {
        \Cart::remove($id);

        return redirect()->back()->with('message', 'Item removed from cart successfully.');
    }
}
