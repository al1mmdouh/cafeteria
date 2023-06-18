<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$orders = $db->query("SELECT * FROM orders")->get();
$users = $db->query("SELECT * FROM users")->get();

// Create a mapping of user IDs to users
$userMap = [];
foreach ($users as $user) {
    $userMap[$user['id']] = $user;
}

view("admin-orders/index.view.php", [
    'heading' => 'My orders',
    'orders' => $orders,
    'userMap' => $userMap
]);
