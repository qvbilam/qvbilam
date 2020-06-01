<?php

namespace Tools;

class Redis
{
    use Singleton;

    static private $redis;

    private function __construct()
    {
        self::$redis = new \Redis();
        self::$redis->connect('127.0.0.1', 6379);
    }

    public function __call($name, $arguments)
    {
        return self::$redis->$name(...$arguments);
    }

}
