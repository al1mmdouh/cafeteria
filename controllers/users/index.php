<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];

$users = $db->query("select * from users")->get();

authorize($role === "admin");

view("users/index.view.php", [
    'heading' => 'All Users',
    'users' => $users
]);