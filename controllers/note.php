<?php

$config = require("config.php");
$db = new Database($config['database'], 'dev', '66546654');

$heading = "Note";
$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

require "views/note.view.php";
