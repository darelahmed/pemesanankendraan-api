<?php

namespace App\Providers;

use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\Validator;

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
        Paginator::useBootstrap();
        Validator::extend('enum', function ($attribute, $value, $parameters, $validator) {
            // Ganti ini dengan definisi validasi enum Anda.
            $validEnums = ['Pending', 'Approved', 'Rejected', 'Bad', 'Normal', 'Good'];

            return in_array($value, $validEnums);
        });
    }
}
