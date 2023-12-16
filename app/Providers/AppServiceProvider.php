<?php

namespace App\Providers;

use App\Http\Controller\Product;
use App\Customer;
use App\Order;
use App\CategoryProduct;
use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        // view()->composer('*',function($view){
        //     $min_price = Product::min('product_price');
        //     $max_price = Product::max('product_price');

        //     $product = Product::all()->count();
        //     $order = Order::all()->count();
        //     $customer = Customer::all()->count();
        //     $category_product = CategoryProduct::all()->count();

        //     $view->with('min_price',$min_price)->with('max_price',$max_price)->with('product',$product)->with('order',$order)->with('category_product',$category_product);
        // });
        //
    }
}
