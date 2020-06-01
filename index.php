<?php

define('QVBILAM_ROOT',__DIR__);

include QVBILAM_ROOT . '/Tools/Autoloader.php';

spl_autoload_register('\\Tools\\Autoloader::autoload');


\Tools\Core::run();

