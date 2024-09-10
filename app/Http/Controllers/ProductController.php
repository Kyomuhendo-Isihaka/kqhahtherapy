<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\Product;
use Illuminate\Http\Request;

class ProductController extends Controller
{
    //
    public function index($category){
        $prices = Pricing::orderBy('id','desc')->get();
        return view('admin.pages.products', compact('category', 'prices'));
    }

    public function create($category){
        $prices = Pricing::all();
        return view('admin.pages.create_product', compact('category', 'prices'));
    }

    protected $publicHtmlImagePath = 'public/uploads';
    public function store(Request $request)
    {
        // Validate the request data
        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'colors' => 'nullable|string',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string',
            'productPrices' => 'nullable|array',
            'productPrices.*' => 'numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        // Handle file upload
        $imagePath = null;
        if ($request->hasFile('image')) {
            $imageName = time() . '_' . $request->file('image')->getClientOriginalName();
            $destinationPath = $this->publicHtmlImagePath;

            // Move the image to public_html/images directory
            $request->file('image')->move($destinationPath, $imageName);

            // Set the URL path to access the image
            $imagePath = $imageName;
        }

        // Create a new product
        Product::create([
            'name' => $request->input('name'),
            'category' => $request->input('category'),
            'color' => $request->input('color'),
            'sizes' => json_encode($request->input('size', [])),
            'price' => json_encode($request->input('productPrices', [])),
            'description' => $request->input('description'),
            'image_path' => $imagePath,
        ]);


        return redirect()->back()->with('success', 'Product created successfully!');
    }
}
