<?php
namespace market;
use tj_core\Providers\AppServiceProvider;

class MarketServiceProvider extends AppServiceProvider
{
    public function boot()
    {
//        $this->loadViewsFrom(__DIR__. '/Views/', __NAMESPACE__);
    }

    public function register()
    {
        include __DIR__.'/routes.php';
        $this->app->make('market\Controllers\BaseController');
    }
}