<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;

class ProductController extends Controller
{
    //
    public function index($category)
    {
        $prices = Pricing::orderBy('id', 'desc')->get();
        $products = Product::where('category', $category)->orderBy('id', 'desc')->paginate('10');
        return view('admin.pages.products', compact('category', 'prices', 'products'));
    }

    public function create($category)
    {
        $prices = Pricing::all();
        return view('admin.pages.create_product', compact('category', 'prices'));
    }

    public function edit($category, $id)
    {
        $prices = Pricing::all();
        $product = Product::findOrFail($id);
        return view('admin.pages.edit_product', compact('category', 'product', 'prices'));
    }


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
            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');
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

        $category = $request->input('category');

        return redirect()->route('products', $category)->with('success', 'Product created successfully!');
    }

    public function update(Request $request, $id)
    {

        $request->validate([
            'name' => 'required|string|max:255',
            'category' => 'required|string',
            'color' => 'nullable|string',
            'sizes' => 'nullable|array',
            'sizes.*' => 'string',
            'productPrices' => 'nullable|array',
            'productPrices.*' => 'numeric',
            'description' => 'nullable|string',
            'image' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);


        $product = Product::findOrFail($id);


        if ($request->hasFile('image')) {
            if ($product->image_path) {
                Storage::disk('public')->delete($product->image_path);
            }


            $image = $request->file('image');
            $imageName = time() . '_' . uniqid() . '.' . $image->getClientOriginalExtension();
            $imagePath = $image->storeAs('uploads', $imageName, 'public');


            $product->image_path = $imagePath;
        }


        $product->name = $request->input('name');
        $product->category = $request->input('category');
        $product->color = $request->input('color');
        $product->sizes = json_encode($request->input('size', []));
        $product->price = json_encode($request->input('productPrices', []));
        $product->description = $request->input('description');


        $product->save();

        return redirect()->route('products', $product->category)->with('success', 'Product updated successfully!');
    }



    public function destroy($id)
    {

        $product = Product::findOrFail($id);


        if ($product->image_path) {
            Storage::delete($product->image_path);
        }

        $product->delete();


        return redirect()->back()->with('success', 'Product deleted successfully');
    }





}
