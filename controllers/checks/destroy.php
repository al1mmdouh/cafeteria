<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$order = $db->query('select * from orders where id = :id', [
    'id' => $_POST['id']
])->findOrFail();


$db->query('delete from orders where id = :id', [
    'id' => $_POST['id']
]);

header('location: /checks');
exit();
