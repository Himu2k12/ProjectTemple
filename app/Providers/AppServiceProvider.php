<?php

namespace App\Providers;

use App\Event;
use Illuminate\Support\ServiceProvider;
use View;

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
        $events = Event::where('publication_status',1)->orderby('id','desc')->limit(4)->get();
        if (!$events==null){
            View::Share('events',$events);
        }else{
            View::Share('events',null);
        }

    }
}
