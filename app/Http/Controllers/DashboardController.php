<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Http\Request;

class DashboardController extends Controller
{
    public function orders(){
        $orders = Order::all();
        return view('admin.orders.index', compact('orders'));
    }
}
