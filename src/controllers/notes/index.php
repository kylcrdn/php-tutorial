<?php

use core\Database;
use core\App;

$db = App::resolve(Database::class);

requireLogin();
$currentUserId = currentUserId();

$notes = $db->query('select * from notes where user_id = :user_id', [
    'user_id' => $currentUserId,
])->get();

view('notes/index.view.php', [
    'heading' => 'My Notes',
    'notes' => $notes,
]);
