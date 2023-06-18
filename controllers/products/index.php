<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];;

$products = $db->query("select * from products")->get();

authorize($role === "admin");

view("products/index.view.php", [
    'heading' => 'All Products',
    'products' => $products
]);