<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index($category){
        return view('admin.pages.products', compact('category'));
    }

    public function create($category){
        return view('admin.pages.create_product', compact('category'));
    }
}
