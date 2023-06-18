<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];;

$product = $db->query('select * from products where id = :id', [
    'id' => $_GET['id']
])->findOrFail();

authorize($role === "admin");


view("products/edit.view.php", [
    'heading' => 'Edit Product',
    'errors' => [],
    'product' => $product
]);