<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];
;

$order = $db->query('select * from orders where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


view("checks/edit.view.php", [
    'heading' => 'Edit Check',
    'errors' => [],
    'order' => $order,
    'role' => $role
]);