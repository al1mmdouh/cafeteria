<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];
;

$order = $db->query('select * from orders where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($order['user_id'] === $currentUserId);

$db->query('delete from orders where id = :id', [
    'id' => $_POST['id']
]);

header('location: /orders');
exit();