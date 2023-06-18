<?php

use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$currentUserId = $_SESSION['user']['user_id'];

// Find the corresponding check
$check = $db->query('select * from orders where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


// Validate the form
$errors = [];

// Update the validation rules based on the new requirements
if (!Validator::numeric($_POST['total_amount']) || $_POST['total_amount'] <= 0) {
    $errors['total_amount'] = 'Total amount must be a positive number.';
}

$statusOptions = ['processing', 'out_for_delivery', 'done'];
if (!in_array($_POST['status'], $statusOptions)) {
    $errors['status'] = 'Invalid status value.';
}

// If there are validation errors, return the edit view with the errors and check data
if (count($errors)) {
    return view('checks/edit.view.php', [
        'heading' => 'Edit Check',
        'errors' => $errors,
        'check' => $check
    ]);
}

// If no validation errors, update the record in the checks database table
$db->query('update orders set total_amount = :total_amount, status = :status where id = :id', [
    'id' => $_POST['id'],
    'total_amount' => $_POST['total_amount'],
    'status' => $_POST['status']
]);

// Redirect the user to the checks index page
header('location: /checks');
die();