<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);

$role          = $_SESSION['user']['role'];
$currentUserId = $_SESSION['user']['user_id'];
;

$products = $db->query("SELECT * FROM products")->get();

$selectedProduct = null;
if (isset($_GET['product'])) {
    $productId       = $_GET['product'];
    $selectedProduct = $db->query('select * from products where id = :id', [
        'id' => $productId
    ])->findOrFail();
}

$orders = $db->query("select * from orders")->get();

$users = $db->query("select * from users")->get();

authorize($role === "admin");


view("admin-orders/create.view.php", [
    'heading' => 'All Orders',
    'orders' => $orders,
    'products' => $products,
    'selectedProduct' => $selectedProduct,
    'users' => $users
]);