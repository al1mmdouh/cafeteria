<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$order = $db->query('SELECT * FROM orders WHERE id = :id', [
    'id' => $_GET['id']
])->findOrFail();

$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $order['user_id']
])->findOrFail();


view("admin-orders/show.view.php", [
    'heading' => 'Order',
    'order' => $order,
    'user' => $user,
]);