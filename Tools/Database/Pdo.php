<?php

namespace Tools\Database;

use Tools\AdaptorDatabase;

class Pdo implements AdaptorDatabase
{
    protected $link;

    // 连接数据库
    function connect($host, $user, $pwd, $db, $port = 3306)
    {
        // TODO: Implement connect() method.
        $this->link = new \PDO("mysql:host=$host;dbname=$db", $user, $pwd);

    }

    // 执行sql
    function query($sql)
    {
        // TODO: Implement query() method.
        return  $this->link->query($sql);
    }

    // 关闭数据库
    function close()
    {
        // TODO: Implement close() method.
        unset($this->link);
    }
}