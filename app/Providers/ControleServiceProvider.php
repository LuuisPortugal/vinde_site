<?php

namespace App\Providers;

use App\CategoriaTransacao;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Cache;
use Illuminate\Support\ServiceProvider;

class ControleServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        view()->composer(['layout.controle'], function ($view) {
            $usuario = Auth::user();
            $view->with('usuario', $usuario);

            $site_menu = Cache::remember('site_menu', \Carbon\Carbon::now()->addMinutes(10), function () {
                return CategoriaTransacao::whereNotNull('ordem')->orderBy('ordem')->get()->toArray();
            });
            $view->with('site_menu', $site_menu);
        });
    }

    /**
     * Register the application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
