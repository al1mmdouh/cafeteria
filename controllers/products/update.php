<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];;

// find the corresponding product
$product = $db->query('select * from products where id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// authorize that the current user can edit the product
authorize($role === "admin");

// validate the form
$errors = [];

if (!Validator::string($_POST['name'], 1, 255)) {
    $errors['name'] = 'A name of 1 to 255 characters is required.';
}

if (!Validator::numeric($_POST['price'])) {
    $errors['price'] = 'A valid price is required.';
}

// if no validation errors, update the record in the products database table.
if (count($errors)) {
    return view('products/edit.view.php', [
        'heading' => 'Edit Product',
        'errors' => $errors,
        'product' => $product
    ]);
}

$db->query('UPDATE products SET name = :name, price = :price WHERE id = :id', [
    'id' => $_POST['id'],
    'name' => $_POST['name'],
    'price' => $_POST['price']
]);

// redirect the user
header('location: /products');
die();
