<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db     = App::resolve(Database::class);
$errors = [];
$role   = $_SESSION['user']['role'];
;


if (!Validator::string($_POST['name'], 1, 1000)) {
    $errors['name'] = 'A name of no more than 1,000 characters is required.';
}

if (!Validator::numeric($_POST['price'])) {
    $errors['price'] = 'A price must be numeric.';
}

authorize($role === "admin");


if (!empty($errors)) {
    return view("products/create.view.php", [
        'heading' => 'Create Product',
        'errors' => $errors
    ]);
}

$currentCategoryId = $_POST['category_id'];

$db->query('INSERT INTO products(name, price, category_id) VALUES(:name, :price, :category_id)', [
    'name' => $_POST['name'],
    'price' => $_POST['price'],
    'category_id' => $currentCategoryId
]);

header('location: /products');
die();