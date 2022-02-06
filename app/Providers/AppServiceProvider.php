<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Schema;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\Facades\Cookie;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;



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
    public function boot(Request $request)
    {

        Paginator::useBootStrap();
        Schema::defaultStringLength(191);

        $email = Cookie::get('email');
        $value = DB::select('select * from nhanviens where email = ?', [$email]);
        if ($request->datedtstart == $request->datedtend) {
            $doanhthu  = DB::select('select sum(hoadonbans.TongTien) as dt from hoadonbans where DATE(NgLap) LIKE ?', [$request->datedtstart]);
        } else {
            $doanhthu  = DB::select('select sum(hoadonbans.TongTien) as dt from hoadonbans where DATE(NgLap) >= ? and DATE(NgLap) <= ?', [$request->datedtstart, $request->datedtend]);
        }

        view()->share('value', $value);
    }
}
