<?php


namespace Tools;

class Autoloader
{
    static function autoload($class)
    {
        include QVBILAM_ROOT . '/' . str_replace('\\', '/', $class) . '.php';
    }
}