<?php

// Static pages
$router->get('/', 'src/controllers/index.php');
$router->get('/about', 'src/controllers/about.php');
$router->get('/contact', 'src/controllers/contact.php');

// Related to Notes
$router->get('/notes', 'src/controllers/notes/index.php');
$router->get('/note', 'src/controllers/notes/show.php');
$router->get('/notes/create', 'src/controllers/notes/create.php');

// Creating a Note
$router->post('/notes', 'src/controllers/notes/store.php');

// Deleting a Note
$router->delete('/note', 'src/controllers/notes/destroy.php');

// Editing a Note
$router->get('/note/edit', 'src/controllers/notes/edit.php');
$router->patch('/note', 'src/controllers/notes/update.php');

// Register a New User
$router->get('/register', 'src/controllers/registration/create.php');
$router->post('/register', 'src/controllers/registration/store.php');