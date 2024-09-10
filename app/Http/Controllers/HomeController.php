<?php

namespace App\Http\Controllers;

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
        return view('pages.product_details', compact('product'));
    }


    public function checkout(){
        return view('pages.checkout');
    }
}
