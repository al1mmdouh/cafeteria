<?php

use Core\App;
use Core\Validator;
use Core\Database;

$db     = App::resolve(Database::class);
$errors = [];
$role   = $_SESSION['user']['role'];

var_dump($_POST);
var_dump($_SESSION);

if (!Validator::numeric($_POST['total_amount'])) {
    $errors['total_amount'] = 'Total amount must be numeric.';
}

if (!empty($errors)) {
    return view("orders/create.view.php", [
        'heading' => 'Create Order',
        'errors' => $errors
    ]);
}

$user_id      = $_SESSION['user']['user_id'];
$total_amount = $_POST['total_amount'];
$order_date   = date('Y-m-d H:i:s');
$status       = 'processing';

$db->query('INSERT INTO orders(user_id, total_amount, order_date, status) VALUES(:user_id, :total_amount, :order_date, :status)', [
    'user_id' => $user_id,
    'total_amount' => $total_amount,
    'order_date' => $order_date,
    'status' => $status
]);

header('location: /orders');
die();