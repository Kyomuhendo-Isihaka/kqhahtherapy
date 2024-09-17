<?php

namespace App\Http\Controllers;

use App\Models\Order;
use App\Models\OrderItem;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    //
    public function index(){

        $recentOrderItems = OrderItem::latest()->take(10)->get();
        $totalRevenue = Order::where('status', 'delivered')->sum('total');
        $totalOrders = Order::all()->count();
        $deliveredOrders = Order::where('status', 'delivered')->count();
        $canceledOrders = Order::where('status', 'canceled')->count();
        return view('admin.pages.dashboard', compact('recentOrderItems','totalRevenue','totalOrders','deliveredOrders', 'canceledOrders'));
    }
}
