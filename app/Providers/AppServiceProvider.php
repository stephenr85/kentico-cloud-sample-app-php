<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Contracts\View\View;

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

        view()->share('company_address', $homeData->getString('contact'));
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $deliverClient = new \KenticoCloud\Deliver\Client('975bf280-fd91-488c-994c-2f04416e5ee3');
        $this->app->instance('DeliverClient', $deliverClient);
    }
}
