<?php
namespace App\Providers;

use Illuminate\Support\ServiceProvider;
use Illuminate\Support\Facades\View;

class ViewComposerServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->ViewComposers();
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
    public function ViewComposers()
    {
        View::composer('backpack::inc.sidebar', 'App\Composers\SidebarComposer');
        View::composer('frontend.master', 'App\Composers\ContactComposer');
    }
}