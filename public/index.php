<?php

ini_set('display_errors', 1);
ini_set('display_startup_errors', 1);
error_reporting(E_ALL);

const BASE_PATH = __DIR__ . '/../';

require BASE_PATH . "functions.php";

spl_autoload_register(function($class) {
    require base_path("Core/{$class}.php");
});

require base_path("router.php");
