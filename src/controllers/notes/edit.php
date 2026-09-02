<?php

use core\Database;
use core\App;

$db = App::resolve(Database::class);

requireLogin();
$currentUserId = currentUserId();

$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
    'id' => $_GET['id'],
    'user_id' => $currentUserId,
])->findOrFail();

view('notes/edit.view.php', [
    'heading' => 'Edit Note',
    'errors' => [],
    'note' => $note,
]);
