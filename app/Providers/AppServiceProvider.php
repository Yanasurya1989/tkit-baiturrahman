<?php

namespace App\Providers;

use App\Models\CallToAction;
use Illuminate\Support\Facades\View;
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

    public function boot()
    {
        // Kirim ke semua view
        View::composer('*', function ($view) {
            $view->with('cta', CallToAction::latest()->first());
        });
    }
}
