<?php

namespace App\Providers;

use App\Repositories\ContactRepository;
use App\Repositories\ContactRepositoryImp;
use App\Services\ContactService;
use App\Services\ContactServiceImp;
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
        $this->app->bind(ContactRepository::class, ContactRepositoryImp::class);
        $this->app->bind(ContactService::class, ContactServiceImp::class);
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {

    }
}
