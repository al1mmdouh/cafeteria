<?php 


// ------------------------------ Order routes

$router->get('/orders', 'controllers/orders/index.php')->only('auth')->only('auth');
$router->get('/order', 'controllers/orders/show.php')->only('auth');
$router->delete('/order', 'controllers/orders/destroy.php')->only('auth');

$router->get('/order/edit', 'controllers/orders/edit.php')->only('auth');
$router->patch('/order', 'controllers/orders/update.php')->only('auth');

$router->get('/orders/create', 'controllers/orders/create.php')->only('auth');
$router->post('/orders', 'controllers/orders/store.php')->only('auth');

// ------------------------------ Admin Order routes

$router->get('/admin-orders', 'controllers/admin-orders/index.php')->only('auth');
$router->get('/admin-order', 'controllers/admin-orders/show.php')->only('auth');
$router->delete('/admin-order', 'controllers/admin-orders/destroy.php')->only('auth');

$router->get('/admin-order/edit', 'controllers/admin-orders/edit.php')->only('auth');
$router->patch('/admin-order', 'controllers/admin-orders/update.php')->only('auth');

$router->get('/admin-orders/create', 'controllers/admin-orders/create.php')->only('auth');
$router->post('/admin-orders', 'controllers/admin-orders/store.php')->only('auth');

?>