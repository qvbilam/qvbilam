<?php

namespace App\Controller\Index;

use Tools\Database\Mysqli;
use Tools\Database\Pdo;


class Index
{
    public $strategy;

    public function index()
    {
        echo '欢迎使用QvBiLam' . PHP_EOL;
    }

    public function orders()
    {
//        $db = new Mysqli();
        $db = new Pdo();
        $db->connect('127.0.0.1', 'root', 'root', 'test');
        $data = $db->query('select * from orders');
        $db->close();
        foreach ($data as $v) {
            print_r($v);
        }
    }

    public function showGoods()
    {
        $sex = isset($_GET['sex']) ? $_GET['sex'] : 1;
        $this->setStrategy($sex);
        $this->strategy->showGoods();

    }

    protected function setStrategy($sex)
    {
        if ($sex == 0) {
            $strategy = new \Tools\WomanStrategy();
        } else {
            $strategy = new \Tools\ManStrategy();

        }
        $this->strategy = $strategy;
    }
}