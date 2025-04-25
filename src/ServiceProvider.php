<?php

namespace Shebaoting\LaravelWechatNotification;

use Illuminate\Support\ServiceProvider as LaravelServiceProvider;
use Illuminate\Support\Facades\Notification;
use Shebaoting\LaravelWechatNotification\Channels\WechatTemplateChannel;


class ServiceProvider extends LaravelServiceProvider
{

    /**
     * Register any application services.
     *
     * @return void
     */
    public function register() {}

    /**
     * Bootstrap any application services.
     *
     * @return void
     */
    public function boot()
    {
        $channels = [
            'official_account',
            'mini_program',
            'open_official_account',
            'open_mini_program',
            'work',
            'open_work'
        ];

        foreach ($channels as $channel) {
            Notification::extend($channel, function ($app) use ($channel) {
                return new WechatTemplateChannel($channel);
            });
        }
    }
}
