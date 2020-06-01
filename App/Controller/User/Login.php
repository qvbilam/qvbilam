<?php

namespace App\Controller\User;



class Login
{

    static function success()
    {
        echo '登录成功' . PHP_EOL;
    }

    static function getUser()
    {
        $user = isset($_GET['user'])?$_GET['user']:'sms_15032061937';
        $getUserName = \Tools\Redis::getInstance()->get($user);
        print_r($getUserName);
    }


}