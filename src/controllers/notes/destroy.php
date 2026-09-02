<?php

use core\App;
use core\Database;
use core\functions;

$db = App::resolve(Database::class);

requireLogin();
$currentUserId = currentUserId();

$note = $db->query('select * from notes where id = :id and user_id = :user_id', [
    'id' => $_POST['id'],
    'user_id' => $currentUserId,
])->findOrFail();

$db->query('delete from notes where id = :id and user_id = :user_id', [
    'id' => $_POST['id'],
    'user_id' => $currentUserId,
]);

header('location: /notes');

exit();