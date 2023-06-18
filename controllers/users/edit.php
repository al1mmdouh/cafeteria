<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];;

$user = $db->query('select * from users where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($role === "admin");


view("users/edit.view.php", [
    'heading' => 'Edit User',
    'errors' => [],
    'user' => $user
]);