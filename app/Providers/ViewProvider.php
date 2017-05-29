<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class ViewProvider extends ServiceProvider
{
    /**
     * Bootstrap the application services.
     *
     * @return void
     */
    public function boot()
    {
        //Provides Sidebar
        $this->composeNav();
        $this->composeTerms();
        $this->composeTermsNav();
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

    public function composeNav(){
        view()->composer('includes/adminNavBar', 'App\Http\ViewComposers\NavComposer');
    }

    public function composeTerms(){
        view()->composer('front.terms.index', 'App\Http\ViewComposers\TermsComposer');
    }

    public function composeTermsNav(){
        view()->composer('includes/termsNav', 'App\Http\ViewComposers\TermsNavComposer');
    }
}
