<?php

$_SESSION['name'] = 'Ian';

view("index.view.php", [
    'heading' => 'Home',
]);
