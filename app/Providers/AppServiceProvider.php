<?php

namespace App\Providers;
use App\sanpham;
use Illuminate\Support\ServiceProvider;
use App\chitietsp;
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
        view()->composer('*',function($view){
            $min_price = sanpham::min('gia');
            $max_price = sanpham::max('gia');
            // $min_mass = chitietsp::min('khoiluong');
            // $max_mass = chitietsp::max('khoiluong');
            $view->with('min_price', $min_price)->with('max_price', $max_price);
        });
    }
}
