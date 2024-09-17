<?php

namespace App\Http\Controllers;

use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class OrderController extends Controller
{
    //
    public function orderDetails($id){
        $order = Order::findOrFail($id);
        $orderItems = OrderItem::where('order_id', $id)->get();

        return view('admin.pages.order_details', compact('orderItems','order'));
    }
    public function orders()
    {
        $orders = Order::orderBy('id','desc')->paginate(10);
        $pendingOrders = Order::where('status', 'pending')->count();
        $shippedOrders = Order::where('status', 'shipped')->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $canceledOrders = Order::where('status', 'canceled')->count();

        return view('admin.pages.orders', compact('orders','pendingOrders','shippedOrders','deliveredOrders','canceledOrders'));
    }

    public function store(Request $request)
    {

        $user_id = request()->cookie('user_id');
        // Validate the request
        $request->validate([
            'shipping_address' => 'required|string|max:255',
            'city' => 'nullable|string|max:255',
            'state' => 'nullable|string|max:255',
            'zipcode' => 'nullable|string|max:255',
            'phone_number' => 'nullable|string|max:255',
            'email' => 'nullable|email|max:255',
            'cart' => 'required|string',
            'total' => 'required|numeric',

        ]);

        // // Create a new order
        $order = Order::create([
            'user_id' => $user_id,
            'shipping_address' => $request->shipping_address,
            'city' => $request->city,
            'state' => $request->state,
            'zipcode' => $request->zipcode,
            'phone' => $request->phone_number,
            'email' => $request->email,
            'total' => $request->total,
            'status' => 'pending',
        ]);

        $cart = json_decode($request->input('cart'), true);

        // // Save order items
        foreach ($cart as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'product_id' => $item['id'], // Assuming your cart items contain product IDs
                'quantity' => $item['no_of_items'],
                'price' => $item['pdt_cost'],
            ]);
        }

        // Remove cart items for the user
        Cart::where('user_id', $user_id)->delete();

        // Redirect or return response
        return redirect()->route('thankyou')->with('success', 'Order placed successfully!');
    }

    public function update(Request $request, $id)
{
    // Validate the request
    $request->validate([
        'status' => 'required|in:shipped,canceled,delivered',
    ]);

    // Find the order and update its status
    $order = Order::findOrFail($id);
    $order->status = $request->status;
    $order->save();

    // Redirect back with a success message
    return redirect()->route('orders.details', $order->id)->with('success', 'Order status updated successfully!');
}

}
