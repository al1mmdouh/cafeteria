<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];
;

$product = $db->query('select * from products where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

authorize($role === "admin");

$db->query('delete from products where id = :id', [
    'id' => $_POST['id']
]);

header('location: /products');
exit();