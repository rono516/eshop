<?php

namespace App\Http\Controllers\Frontend;

use App\Http\Controllers\Controller;
use App\Models\Order;
use App\Models\OrderItem;
use App\Models\Product;
use App\Models\Category; 
use Illuminate\Support\Facades\Auth;

class FrontendController extends Controller
{
    public function index()
    {
        $featured_products= Product::where('status', true)->take(15)->get();
        $trending_category = Category::where('status', true)->take(15)->get();
         return view('frontend.index', compact('featured_products', 'trending_category' ));

    }
    public function category()
    {
        $category = Category::all();
        //where('status', '0')->get();
        return view('frontend.category')->with([
            'category' => $category
        ]);
        //, compact('category'));
    }
    public function viewcategory($slug)
    {
        if (Category::where('slug', $slug)->exists()) {
            $category = Category::where('slug', $slug)->first();
            $products = Product::where('category_id', $category-> id )
                // ->where('status', '0')
                ->get();
            return view('frontend.products.index', compact('category', 'products'));
        }
        else{
            return redirect('/home')->with('status','Slug does not exist');
        }

    }
    // public function productview($cate_slug, $prod_meta_description)
    public function productview($id)
    {
        $products = Product::find($id);

        return view('frontend.products.view')->with([
            'products' => $products
        ]);
        // if (Category::where('slug', $cate_slug)->exists())
        // {
        //     if(Product::where('meta_description', $prod_meta_description)->exists())
        //     {
        //         $products = Product::where('meta_description', $prod_meta_description)->first() ;
        //         return view('frontend.products.view', compact('products'));
        //     }
        //     else{
        //         return redirect('/home')->with('status', 'The link was broken');
        //     }
        // }
        // else{
        //     return redirect('/home')->with('status', 'No such category found');
        // }
    }

    public function my_orders(){
        $user_orders = Order::where('user_id', "=", Auth::id())->get();
       // dd($user_orders->count());
        return view('frontend.orders', compact('user_orders'));
    }

    public function view_order($id){
        $oItems = OrderItem::where('order_id',"=", $id)->get();
        $order = Order::where('id',"=", $id)->first()   ;
        return view('frontend.view_order', compact('oItems', 'order'));
    }
}
