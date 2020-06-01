<?php

namespace Tools;

class WomanStrategy implements Strategy
{
    public function showGoods()
    {
        echo '化妆品' . PHP_EOL;
    }
}