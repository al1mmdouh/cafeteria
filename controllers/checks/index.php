<?php

use Core\App;
use Core\Database;

$db = App::resolve(Database::class);


$orders = $db->query("select * from orders where status = 'done'")->get();

view("checks/index.view.php", [
    'heading' => 'Done Checks',
    'orders' => $orders
]);