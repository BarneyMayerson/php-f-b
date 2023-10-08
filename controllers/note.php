<?php

$config = require("config.php");
$db = new Database($config['database'], 'dev', '66546654');

$heading = "Note";

$note = $db->query("select * from notes where id = :id", ['id' => $_GET['id']])->fetch();

require "views/note.view.php";
