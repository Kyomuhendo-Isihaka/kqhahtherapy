<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Pricing;
use App\Models\Product;
use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        $products = Product::orderBy('id','desc')->paginate(12);

        return view('welcome', compact('products'));
    }

    public function products($category){
        $products = Product::where('category', $category)->paginate(12);
        $pricings = Pricing::all();

        return view('pages.products', compact('category','products', 'pricings'));
    }

    public function productDetails($product){
        $product = Product::findOrFail($product);
        return view('pages.product_details', compact('product'));
    }


    public function checkout(){
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

        return view('pages.checkout', compact('cart', 'total'));
    }

    public function thankyou(){
        return view('pages.thankyou');
    }
}
