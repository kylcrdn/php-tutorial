<?php

use core\Database;
use core\App;
use core\Validator;

$db = App::resolve(Database::class);

requireLogin();
$currentUserId = currentUserId();

// find the corresponding note
$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
    'id' => $_POST['id'],
    'user_id' => $currentUserId,
])->findOrFail();

// validate the form
$errors = [];

if (! Validator::string($_POST['body'], 1, 1000)) {
    $errors['body'] = 'A body of no more than 1,000 characters is required.';
}

// if no validation errors, update the record in the notes database table
if (count($errors)) {
    return view('notes/edit.view.php', [
        'heading' => 'Edit Note',
        'errors' => $errors,
        'note' => $note,
    ]);
}

$db->query('update notes set body = :body where id = :id and user_id = :user_id', [
    'id' => $_POST['id'],
    'body' => $_POST['body'],
    'user_id' => $currentUserId,
]);

header('location: /notes');
die();
