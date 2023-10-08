<?php

$config = require("config.php");
$db = new Database($config['database'], 'dev', '66546654');

$heading = "Create Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    dd($_POST);
}

require("views/note-create.view.php");