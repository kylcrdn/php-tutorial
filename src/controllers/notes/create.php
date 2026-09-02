<?php

requireLogin();

view('notes/create.view.php', [
    'heading' => 'Create Note',
    'errors' => []
]);