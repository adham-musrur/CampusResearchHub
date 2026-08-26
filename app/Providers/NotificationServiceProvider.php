<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class NotificationServiceProvider extends ServiceProvider
{

    public function register()
    {
        //
    }


    public function boot()
    {

        View::composer(
            'layouts.navigation',
            function ($view) {

                if(auth()->check()) {

                    $notifications = auth()->user()
                        ->unreadNotifications()
                        ->latest()
                        ->take(5)
                        ->get();


                    $view->with(
                        'notifications',
                        $notifications
                    );

                }

            }
        );

    }

}