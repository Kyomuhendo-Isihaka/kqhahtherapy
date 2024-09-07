<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class HomeController extends Controller
{
    //
    public function index(){
        return view('welcome');
    }

    public function products($category){
        return view('pages.products', compact('category'));
    }

    public function productDetails($product){
        return view('pages.product_details', compact('product'));
    }


    public function checkout(){
        return view('pages.checkout');
    }
}
