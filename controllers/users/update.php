<?php
use Core\App;
use Core\Database;
use Core\Validator;

$db = App::resolve(Database::class);

$role = $_SESSION['user']['role'];
;

// Find the corresponding user
$user = $db->query('SELECT * FROM users WHERE id = :id', [
    'id' => $_POST['id']
])->findOrFail();

// Authorize that the current user can edit the user
authorize($role === "admin");

// Validate the form
$errors = [];

if (!Validator::string($_POST['username'], 1, 100)) {
    $errors['username'] = 'A username of 1 to 100 characters is required.';
}

if (!Validator::string($_POST['password'], 6, 255)) {
    $errors['password'] = 'A password of at least 6 characters is required.';
}

if (!Validator::email($_POST['email'])) {
    $errors['email'] = 'Invalid email format.';
}

// Additional validations for the 'role' field can be added if needed

if (count($errors)) {
    return view('users/edit.view.php', [
        'heading' => 'Edit User',
        'errors' => $errors,
        'user' => $user
    ]);
}

// Update the user record in the database
$db->query('UPDATE users SET username = :username, password = :password, email = :email, role = :role WHERE id = :id', [
    'id' => $_POST['id'],
    'username' => $_POST['username'],
    'password' => $_POST['password'],
    'email' => $_POST['email'],
    'role' => $_POST['role']
]);

// Redirect the user
header('location: /users');
die();