<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = 1;

$note = $db->query("select * from notes where id = :id", ['id' => $_POST['id']])->findOrFail();

authorize($note['user_id'] === $currentUserId);

$errors = [];

if (!Validator::string($_POST['body'], 1, 100)) {
    $errors['body'] = 'A body of no more 100 characters is required.';
}

if (!empty($errors)) {
    return view("notes/edit.view.php", [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query("update notes set body = :body where id = :id", [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
]);

header("location: /note?id={$note['id']}");
exit();
