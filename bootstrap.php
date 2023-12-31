<?php

use Core\App;
use Core\Container;
use Core\Database;

$container = new Container();

$container->bind('Core\Database', function () {
    $config = require base_path("config.php");
    
    return new Database($config['database'], 'dev', '66546654');
});

App::setContainer($container);
