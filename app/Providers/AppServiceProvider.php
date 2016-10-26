<?php

namespace App\Providers;

use Illuminate\Support\ServiceProvider;

class AppServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        //
        \Validator::extend('equal_old_password', function($attribute, $value, $parameters, $validator) {
            return \Hash::check($value, \Admin::user()->password);
        });

        \Validator::replacer('equal_old_password', function($message, $attribute, $rule, $parameters) {
            return $message;
        });
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        //
    }
}
