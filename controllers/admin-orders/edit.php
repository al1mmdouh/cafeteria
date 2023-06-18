<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];
;

$order = $db->query('select * from orders where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $order['user_id']
])->findOrFail();


authorize($role === "admin");


view("admin-orders/edit.view.php", [
    'heading' => 'Edit Order',
    'errors' => [],
    'order' => $order,
    'user' => $user
]);