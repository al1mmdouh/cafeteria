<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$order = $db->query('select * from orders where id = :id', [
    'id' => $_GET['id']
])->findOrFail();


view("checks/show.view.php", [
    'heading' => 'Check',
    'order' => $order
]);
