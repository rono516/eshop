<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Order extends Model
{
    use HasFactory;

    protected $table    = 'orders';
    protected $fillable = [
        'user_id',
        'fname',
        'lname',
        'email',
        'phone',
        'address1',
        'address2',
        'town',
        'county',
        'status',
        'message',
        'tracking_no',
    ];

    public function orderItems(): HasMany
    {
        return $this->hasMany(OrderItem::class);
    }

    public function orderAmount()
    {
        $orderItems = $this->orderItems()->get();
        $orderPrice = 0;
        foreach ($orderItems as $item) {
            $totalPrice = $item->price * $item->qty;
            $orderPrice += $totalPrice;
        }

        return $orderPrice;
    }
    public function payment()
    {
        return $this->hasOne(Payment::class);
    }
}
