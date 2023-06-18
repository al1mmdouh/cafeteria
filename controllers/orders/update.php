<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];

// Find the corresponding order
$order = $db->query('SELECT * FROM orders WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Authorize that the current user can edit the order
authorize($role === "admin");

// Validate the form
$errors = [];

if (!Validator::numeric($_POST['total_amount'])) {
    $errors['total_amount'] = 'A valid total amount is required.';
}

if (!in_array($_POST['status'], ['processing', 'out_for_delivery', 'done'])) {
    $errors['status'] = 'Invalid status value.';
}

// If there are validation errors, return the edit view with errors and order data
if (count($errors)) {
    return view('orders/edit.view.php', [
        'heading' => 'Edit Order',
        'errors' => $errors,
        'order' => $order
    ]);
}

// Update the record in the orders database table
$db->query('UPDATE orders SET total_amount = :total_amount, status = :status WHERE id = :id', [
    'id' => $_POST['id'],
    'total_amount' => $_POST['total_amount'],
    'status' => $_POST['status']
]);

// Redirect the user to the orders page
header('location: /orders');
die();