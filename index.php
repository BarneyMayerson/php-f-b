<?php

require "functions.php";
// require "router.php";
require "Database.php";

$config = require("config.php");

$db = new Database($config['database'], 'dev', '66546654');

$id = $_GET['id'];

$query = 'SELECT * FROM posts WHERE id = ?';

$posts = $db->query($query, [$id])->fetch();

dd($posts);

// Episode 3-21 sticks only database structure

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
