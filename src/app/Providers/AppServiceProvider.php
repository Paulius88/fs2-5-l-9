<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\DB;
use Laravel\Sanctum\Sanctum;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        Sanctum::ignoreMigrations();
    }

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->databaseListener();
    }

    protected function databaseListener()
    {
        if (app()->environment('local')) {
            DB::listen(function ($query) {
                $querySql = str_replace(['?'], ['\'%s\''], $query->sql);

                $queryRawSql = vsprintf($querySql, $query->bindings);

                logger()->channel('stderr')->debug('[SQL EXEC] - ' . $queryRawSql , ['time' => $query->time]);
            });
        }
    }
}
