<?php

namespace App\Providers;

use App\Services\TransportServices\EmailService;
use App\Services\TransportServices\SmsService;
use App\Services\TransportServices\TelegramService;
use Illuminate\Support\ServiceProvider;

class AcceptServiceProvider extends ServiceProvider
{
    /**
     * Register services.
     *
     * @return void
     */
    public function register()
    {
        //
        $this->app->bind('telegram', TelegramService::class);
        $this->app->bind('sms', SmsService::class);
        $this->app->bind('email', EmailService::class);
    }

    /**
     * Bootstrap services.
     *
     * @return void
     */
    public function boot()
    {
        //
    }
}
