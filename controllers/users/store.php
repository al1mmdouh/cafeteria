<?php
use Core\App;
use Core\Validator;
use Core\Database;

$db     = App::resolve(Database::class);
$errors = [];

// Validate form inputs
if (!Validator::string($_POST['username'], 1, 100)) {
    $errors['username'] = 'A username of no more than 100 characters is required.';
}

if (!Validator::string($_POST['password'], 6, 255)) {
    $errors['password'] = 'A password of at least 6 characters is required.';
}

if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Invalid email format.';
}

// Other validations can be added for the 'role' field if needed

if (!empty($errors)) {
    return view("users/create.view.php", [
        'heading' => 'Create User',
        'errors' => $errors
    ]);
}

// Store the user in the database
$db->query('INSERT INTO users(username, password, email, role) VALUES(:username, :password, :email, :role)', [
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'email' => $_POST['email'],
    'role' => $_POST['role']
]);

header('location: /users');
die();