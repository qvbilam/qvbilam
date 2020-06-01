<?php

namespace Tools;

use function FastRoute\TestFixtures\empty_options_cached;
use function GuzzleHttp\default_user_agent;

class Core
{
    /*
     * 访问方式 /控制器/类/方法
     * https://qvbilam.dev/user/login/success
     * */
    static function run()
    {
        // 去掉开头和结尾的 斜线
        $uri = trim($_SERVER['PATH_INFO'], '/');
        // 按照斜线将字符串升级为数组. arr[0] = 控制器,arr[1] = 类名,arr[2] = 方法
        $uriArr = explode('/', $uri);
        if(empty($uriArr[0])){
            $uriArr = ['index','index','index'];
        }
        switch(count($uriArr)){
            case 0:
                // 默认请求
                $uriArr = ['index','index','index'];
                return false;
            case 1:
                header('HTTP/1.1 404 Not Found');
                return false;
            case 2:
                // 追加默认控制器
                array_unshift($uriArr,'index');
                break;
            case 3:
                break;
            default:
                header('HTTP/1.1 404 Not Found');
                return false;

        }
        // 方法名
        $function = $uriArr[2];
        $class = 'App\\Controller\\' . ucwords($uriArr[0]) . '\\' . ucwords($uriArr[1]);
        // 当类不存在返回4040
        if(!class_exists($class)){
            header('HTTP/1.1 400 Bad Request');
            return false;
        }
        // 实例化类
        $obj = new $class;
        // 当方法不存在返回404
        if (!method_exists($obj, $function)) {
            header('HTTP/1.1 400 Bad Request');
            return false;
        }
        // 执行请求方法
        $obj->$function();
    }
}