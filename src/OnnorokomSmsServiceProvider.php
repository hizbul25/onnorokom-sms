<?php
namespace Hizbul\OnnorokomSms;
use Illuminate\Support\ServiceProvider;

/**
 * Created by PhpStorm.
 * User: hizbul
 * Date: 12/20/16
 * Time: 10:34 AM
 */
class OnnorokomSmsServiceProvider extends ServiceProvider
{
    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $this->publishes([
            __DIR__ . '/config' => base_path('config')
        ]);
    }

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register()
    {
        $this->app->bind('OnnoRokomSMS', function () {
            return new OnnorokomSms;
        });
    }
}