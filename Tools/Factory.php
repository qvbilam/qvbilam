<?php
/**
 * Created by PhpStorm.
 * User: qvbilam
 * Date: 2020-03-06
 * Time: 23:00
 */

// namespace Tools;

// 定义抽象套装接口
interface AbstractSuit
{
    // 获取套装配置
    function getSuit();

    // 定义背景
    function background();

    // 定义气泡
    function bubble();

    // 定义模型
    function model();
}

// 默认套装
class DefaultSuit implements AbstractSuit
{
    public function getSuit()
    {
        $this->background();
        $this->model();
        $this->bubble();
    }

    public function background()
    {
        echo '使用白色背景;';
    }

    public function bubble()
    {
        echo '使用蓝色气泡;';
    }

    public function model()
    {
        echo '使用蓝白气泡.';
    }
}

// 定义vip套装
class VipSuit implements AbstractSuit
{
    public function getSuit()
    {
        $this->background();
        $this->model();
        $this->bubble();
    }

    public function background()
    {
        echo '使用红色背景;';
    }

    public function bubble()
    {
        echo '使用红色气泡;';
    }

    public function model()
    {
        echo '使用红色气泡.';
    }
}

// 定义工厂接口
interface Factory
{
    function getConfig();
}

// 默认工厂
class DefaultFactory implements Factory
{
    public function getConfig()
    {
        return new DefaultSuit();
    }
}

// vip工厂
class VipFactory implements Factory
{
    public function getConfig()
    {
        return new VipSuit();
    }
}

// 获取默认皮肤背景
$default = (new DefaultFactory())->getConfig()->getSuit();
echo PHP_EOL;
$vip = (new VipFactory())->getConfig()->getSuit();

