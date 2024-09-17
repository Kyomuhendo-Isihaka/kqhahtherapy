<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Product;
use Illuminate\Http\Request;

class CartController extends Controller
{
    //
    public function index(){
        $user_id = request()->cookie('user_id'); // Get the currently authenticated user's ID
        $cartUser = Cart::where('user_id', $user_id)->where('cart_status','ordered')->orderBy('id', 'desc')->get();

        $cartCount = $cartUser->count();
        $cart = [];
        $total = [];

        foreach ($cartUser as $user) {
            $pdt = Product::find($user->products);

            if ($pdt) {
                $pdt["no_of_items"] = $user->no_of_items;
                $pdt["pdt_cost"] = $pdt["no_of_items"]*$user->unit_price;
                $actualprice = $user->total_cost;
                $cart[] = $pdt;
                $total[] = $actualprice;
            }
        }

        $total = array_sum($total);
        return view('pages.cart', compact('cart','total','cartCount'));
    }

    public function store(Request $request)
    {
        $qty = $request->input("qtybutton");
        $pdt_id = $request->input("product_id");
        $user_id = request()->cookie('user_id');
        $price = $request->input('price');


        $product = Product::find($pdt_id);
        if (!$product) {
            return redirect('/')->with('error', 'Product does not exist.');
        }

        $cartItem = Cart::where('user_id', $user_id)
            ->where('products', $pdt_id)
            ->where('cart_status', 'ordered')
            ->first();

        if ($cartItem) {

            $cartItem->no_of_items += $qty;
            $cartItem->total_cost += $qty * $cartItem->unit_price; // Using the product price
            $cartItem->save();
        } else {

            Cart::create([
                'user_id' => $user_id,
                'cart_status' => "ordered",
                'products' => $pdt_id,
                'no_of_items' => $qty,
                'unit_price' =>$price,
                'total_cost' => $qty * $price,
            ]);
        }

        return redirect()->route('cart')->with('success', 'Product added to cart successfully.');
    }

    public function reduceFromCart(Request $request)
    {
        $id = $request->input("product_id");
        $action = $request->input('action');
        $user_id = $request->input('user_id');
        $cartItem = Cart::where('user_id', $user_id)
            ->where('products', $id)
            ->where('cart_status', 'ordered')
            ->first();

        if (!$cartItem) {
            return redirect()->back()->with('error', 'Cart item not found.');
        }

        $product = Product::find($cartItem->products);
        if (!$product) {
            return redirect()->back()->with('error', 'Product not found.');
        }

        if ($action == 'increase') {
            $cartItem->no_of_items += 1;
        } elseif ($action == 'decrease') {
            if ($cartItem->no_of_items > 1) {
                $cartItem->no_of_items -= 1;
            } else {
                $cartItem->delete();
                return redirect()->back()->with('success', 'Product removed from cart.');
            }
        }

        $cartItem->total_cost = $cartItem->no_of_items * $cartItem->unit_price;
        $cartItem->save();

        return redirect()->back()->with('success', 'Cart updated successfully.');
    }

    public function deleteFromCart($product_id, $user_id)
    {

        $cartItem = Cart::where('user_id', $user_id)
            ->where('products', $product_id)
            ->first();

        if ($cartItem) {
            $cartItem->delete();
            return redirect()->back()->with('success', 'Product removed from cart successfully.');
        } else {
            return redirect()->back()->with('error', 'Product not found in cart.');
        }
    }
}
