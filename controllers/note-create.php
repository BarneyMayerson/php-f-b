<?php

$config = require("config.php");
$db = new Database($config['database'], 'dev', '66546654');

$heading = "Create Note";

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $errors = [];

    if (strlen($_POST['body']) === 0) {
        $errors['body'] = 'A Body is required.';
    }

    if (strlen($_POST['body']) > 100) {
      $errors['body'] = 'The Body can not be more than 100 characters.';
  }

    if (empty($errors)) {
        $db->query("INSERT INTO notes(body, user_id) VALUES(:body, :user_id)", [
            'body' => $_POST["body"],
            'user_id' => 1,
        ]);
    }
    
}

require("views/note-create.view.php");