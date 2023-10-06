<?php

require "functions.php";
// require "router.php";

$dsn = "mysql:host=localhost;port=3306;dbname=php_for_beginners;user=dev;password=66546654;charset=utf8mb4";

$pdo = new PDO($dsn);

$statment = $pdo->prepare("SELECT * FROM posts");
$statment->execute();

$posts = $statment->fetchAll(PDO::FETCH_ASSOC);

foreach ($posts as $post) {
    echo "<li>{$post['title']}</li>";
}
