<?php

require "functions.php";
// require "router.php";
require "Database.php";

$config = require("config.php");

$db = new Database($config['database'], 'dev', '66546654');

$posts = $db->query("SELECT * FROM posts")->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
