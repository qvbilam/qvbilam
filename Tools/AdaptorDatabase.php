<?php

namespace Tools;


interface AdaptorDatabase
{
    // 定义连接数据库(ip,用户名,密码,数据库,端口号)
    function connect($host,$user,$pwd,$db,$port=3306);
    // 定义执行操作
    function query($sql);
    // 定义关闭连接
    function close();
}
