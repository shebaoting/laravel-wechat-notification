<?php

namespace Shebaoting\LaravelWechatNotification;

use Overtrue\LaravelWeChat\Facade;
use Shebaoting\LaravelWechatNotification\Messages\OfficateAccountTemplateMessage;
use Shebaoting\LaravelWechatNotification\Messages\MiniProgramTemplateMessage;
use Shebaoting\LaravelWechatNotification\Messages\WechatWorkMessage;

class WechatMessage
{

    public static function officialAccount($name = '')
    {
        return new OfficateAccountTemplateMessage(Facade::officialAccount($name));
    }

    public static function miniProgram($name = '')
    {
        return new MiniProgramTemplateMessage(Facade::miniProgram($name));
    }

    public static function openFlatform($name = '')
    {
        return new WechatPlatform(Facade::openPlatform($name));
    }

    public static function work($name = '')
    {
        return new WechatWorkMessage(Facade::work($name)->message);
    }

    public static function openWork($name = '')
    {
        return new WechatOpenWork($name ? app('wechat.open_work.' . $name) : app('wechat.open_work'));
    }
}
