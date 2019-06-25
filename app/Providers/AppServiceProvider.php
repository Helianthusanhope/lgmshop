<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

use Illuminate\Support\Facades\View;
use App\Http\Controllers\Home\IndexController;
use App\Http\Controllers\Home\ActiveController;


class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

        View::share('common_cates_data',IndexController::getPidCatesData());
        View::share('common_actives_data',ActiveController::getActivesAll());
        View::share('actives_not_commend',ActiveController::getActivesNotcommend());
        View::share('common_friends_data',IndexController::gerFriendsData());
        View::share('commoon_Webconfigs_data',IndexController::getWebconfigsData());

    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
