<?php
// app/Services/StatsService.php
namespace App\Services;

use App\Models\Order;
use App\Models\Payment;
use App\Models\Product;

class StatsService
{
    public function getOverview(): array
    {
        return [
            'orders'   => Order::count(),
            'payments' => Payment::sum('amount'),
            'stock'    => Product::sum('qty'),
            'sales'    => Order::all()->sum(fn($order) => $order->orderAmount()),
        ];
    }
}
