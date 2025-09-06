<?php
namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Cart;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Payment;
use App\Models\Product;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Str;

class CheckoutController extends Controller
{

    public function index()
    {

        $old_cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($old_cartItems as $item) {
            if (! Product::where('id', $item->prod_id)->where('qty', '>=', $item->prod_qty)->exists()) {
                $removeItem = Cart::where('user_id', Auth::id())->where('prod_id', $item->prod_id)->first();
                $removeItem->delete();
            }
        }
        $cartItems = Cart::where('user_id', Auth::id())->get();

        return view('frontend.checkout', compact('cartItems'));
    }
    public function placeorder(Request $request)
    {

        $order           = new Order();
        $order->user_id  = Auth::id();
        $order->fname    = $request->input('fname');
        $order->lname    = $request->input('lname');
        $order->email    = $request->input('email');
        $order->phone    = $request->input('phone');
        $order->address1 = $request->input('address1');
        //  $order->address2 = $request -> input('address2');
        $order->town = $request->input('town');
        //  $order->county = $request -> input('county');
        $order->tracking_no = 'mega' . $this->trackingNo();
        $order->save();

        $order->id;

        $cartItems = Cart::where('user_id', Auth::id())->get();
        foreach ($cartItems as $item) {
            OrderItem::create([
                'order_id' => $order->id,
                'prod_id'  => $item->prod_id,
                'qty'      => $item->prod_qty,
                'price'    => $item->products->selling_price,
            ]);
        }

        Payment::create([
            'order_id' => $order->id,
            'amount'   => $order->orderAmount(),
            'status'   => 'Paid',
        ]);

        $cartItems = Cart::where('user_id', Auth::id())->get();
        Cart::destroy($cartItems);

        return redirect()->route('my.orders');

//            return redirect('/')->with('status', 'Order Placed Successfully');
    }

    public function trackingNo()
    {
        $tracking_no = Str::random(8);
        while (Order::where('tracking_no', 'mega' . $tracking_no)->exists()) {
            $tracking_no = Str::uuid();
        }
        return $tracking_no;
    }
}
