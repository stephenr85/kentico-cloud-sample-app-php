<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\View;
use KenticoCloud\Delivery\DeliveryClient;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        $client = $this->app->make('DeliverClient');
        $homeData = $client->getItem('home');

        view()->share('company_address', $homeData->contact);

        view()->share('engage_project_id', 'ace71be0-4898-4e7f-b0b6-f416080e5b8b');

        view()->share('google_maps_key', 'AIzaSyAVOq4C-rf7JVeHt6ws9vsf-KHIRpueASg');
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $deliverClient = new DeliveryClient('975bf280-fd91-488c-994c-2f04416e5ee3');
        $this->app->instance('DeliverClient', $deliverClient);
    }
}
