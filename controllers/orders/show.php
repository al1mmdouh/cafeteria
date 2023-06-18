<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];;

$order = $db->query('select * from orders where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


authorize($order['user_id'] === $currentUserId);


view("orders/show.view.php", [
    'heading' => 'Order',
    'order' => $order
]);
