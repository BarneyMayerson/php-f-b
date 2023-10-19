<?php

use Illuminate\Support\Collection;

require __DIR__ . '/../vendor/autoload.php';

$c = new Collection([
  'one', 'two', 'three', 'four',
]);

var_dump($c);