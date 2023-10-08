<?php

require("Validator.php");

$config = require("config.php");
$db = new Database($config['database'], 'dev', '66546654');

$heading = "Create Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (!Validator::string($_POST['body'], 1, 100)) {
        $errors['body'] = 'A body of no more 100 characters is required.';
    }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
            'body' => $_POST["body"],
            'user_id' => 1,
        ]);
    }
    
}

require("views/note-create.view.php");