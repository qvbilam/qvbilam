<?php

namespace Tools\Database;

use Tools\AdaptorDatabase;

class Mysqli implements AdaptorDatabase
{
    protected $link;

    // 连接数据库
    function connect($host, $user, $pwd, $db, $port = 3306)
    {
        // TODO: Implement connect() method.
        $this->link = mysqli_connect($host, $user, $pwd, $db);
    }

    // 执行sql
    function query($sql)
    {
        // TODO: Implement query() method.
        // 执行并转换结果集为数组
        return $res = mysqli_query($this->link, $sql);

    }

    // 关闭数据库
    function close()
    {
        // TODO: Implement close() method.
        mysqli_close($this->link);
    }
}

