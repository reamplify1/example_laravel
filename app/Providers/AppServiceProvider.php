<?php

namespace App\Providers;


use Illuminate\Database\Eloquent\Model;
use Illuminate\Pagination\Paginator;
use Illuminate\Support\ServiceProvider;


use Illuminate\Support\Facades\DB;

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
        Model::preventLazyLoading();
        // Включаем поддержку внешних ключей для SQLite
        if (env('DB_CONNECTION') === 'sqlite') {
            DB::statement('PRAGMA foreign_keys = ON;');
        }

        // Paginator::useBootstrapFive();
    }
}
