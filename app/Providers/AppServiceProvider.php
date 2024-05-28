<?php

namespace App\Providers;

use Illuminate\Support\Facades\Validator;
use Illuminate\Support\ServiceProvider;

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
        // Menambahkan aturan validasi kustom untuk format tanggal MM/DD/YYYY
        Validator::extend('date_format_mm_dd_yyyy', function ($attribute, $value, $parameters, $validator) {
            return preg_match('/^\d{2}\/\d{2}\/\d{4}$/', $value);
        });
    }
}
