<?php

use Core\App;
use Core\Database;
use Core\Validator;

$email = $_POST['email'];
$password = $_POST['password'];

$errors = [];

if (!Validator::email($email)) {
  $errors['email'] = 'Please provide a valid email address.';
}

if (!Validator::string($password, 3, 16)) {
  $errors['password'] = 'Incorrect password has benn provided. Min 3, max 16 characters required.';
}

if (! empty($errors)) {
    return view('/registration/create.view.php', [
        'errors' => $errors,
    ]);
}

$db = App::resolve(Database::class);

$user = $db->query("select * from users where email = :email", [
    'email' => $email,
])->find();

if ($user) {
    header('location: /');

    exit();
} else {
    $db->query("INSERT INTO users(email, password) VALUES(:email, :password)", [
        'email' => $email,
        'password' => $password,
    ]);

    $_SESSION['user'] = [
        'email' => $email,
    ];

    header('location: /');

    exit();
}