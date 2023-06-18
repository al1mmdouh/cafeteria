<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role          = $_SESSION['user']['role'];
$currentUserId = $_SESSION['user']['user_id'];

$order = $db->query('SELECT * FROM orders WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($order['user_id'] === $currentUserId);

view("orders/edit.view.php", [
    'heading' => 'Order Details',
    'order' => $order,
    'role' => $role
]);