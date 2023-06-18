<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];

$orders = $db->query("select * from orders where user_id = $currentUserId")->get();

view("orders/index.view.php", [
    'heading' => 'My orders',
    'orders' => $orders
]);