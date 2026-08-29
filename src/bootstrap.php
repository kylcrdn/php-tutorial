<?php

use core\Container;
use core\Database;
use core\App;

$container = new Container();

$container->bind('core\Database', function () {
    $config = require base_path('/src/config.php');
    return new Database($config['database']);
});

App::setContainer($container);