<?php

namespace App\Http\Controllers;

use App\Models\Pricing;
use Illuminate\Http\Request;

class PricingController extends Controller
{
    //
    public function store(Request $request)
    {

        $request->validate([
            'milliliters' => 'required|string',
            'price' => 'required|numeric',
        ]);

        Pricing::create([
            'milliliters' => $request->milliliters,
            'price' => $request->price,
        ]);

        return redirect()->back()->with('success', 'Product added successfully!');
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'milliliters' => 'required|string',
            'price' => 'required|numeric',
        ]);

        $pricing = Pricing::findOrFail($id);
        $pricing->milliliters = $request->milliliters;
        $pricing->price = $request->price;
        $pricing->save();

        return redirect()->back()->with('success', 'Pricing updated successfully.');
    }

    public function destroy($id)
{

    $pricing = Pricing::find($id);


    if (!$pricing) {
        return redirect()->back()->with('error', 'Record not found.');
    }


    try {
        $pricing->delete();
        return redirect()->back()->with('success', 'Record deleted successfully.');
    } catch (\Exception $e) {
      
        return redirect()->back()->with('error', 'An error occurred while deleting the record.');
    }
}

}
