<?php

use core\Database;
use core\Validator;
use core\App;

$body = $_POST['body'];

$db = App::resolve(Database::class);

requireLogin();
$currentUserId = currentUserId();

$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1000 characters is required';
}

if (! empty($errors)) {
    return view('notes/create.view.php', [
        'heading' => 'Create Note',
        'errors' => $errors
    ]);
}

$db->query('insert into notes(body, user_id) values(:body,:user_id)', [
    'body' => $body,
    'user_id' => $currentUserId,
]);

header('Location: /notes');
die();