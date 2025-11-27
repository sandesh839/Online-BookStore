<?php

namespace App\Providers;
use Illuminate\Support\Facades\Auth;
use App\Models\Cart;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     */
    public function register(): void
    {
        //
    }

    /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
           view()->composer('*', function ($view) {
        if(Auth::check()) {
            $cart_count = Cart::where('user_id', Auth::id())->sum('quantity');
        } else {
            $cart_count = 0;
        }

        $view->with('cart_count', $cart_count);
    });
        //
    }
}
