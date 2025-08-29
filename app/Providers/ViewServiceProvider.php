<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;
use App\Models\Cart;
use Illuminate\Support\Facades\Auth;

class ViewServiceProvider extends ServiceProvider
{
    public function boot()
    {
        // Share cart count with the frontnavbar view
        View::composer('layouts.inc.frontnavbar', function ($view) {
            $cartCount = 0;
            if (Auth::check()) {
                $cartCount = Cart::where('user_id', Auth::id())->sum('prod_qty');
            }
            $view->with('cartCount', $cartCount);
        });
    }

    public function register()
    {
        //
    }
}
