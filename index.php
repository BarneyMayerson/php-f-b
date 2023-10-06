<?php

require "functions.php";

$uri = parse_url($_SERVER['REQUEST_URI'])['path'];

if ($uri === '/') {
    require('controllers/index.php');
} elseif ($uri === '/about') {
   require('controllers/about.php');
} elseif ($uri === '/contact') {
   require('controllers/contact.php');
}