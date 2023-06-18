<?php

$router->get('/', 'controllers/index.php');
$router->get('/contact', 'controllers/contact.php');

$router->get('/login', 'controllers/session/create.php')->only('guest');
$router->post('/session', 'controllers/session/store.php')->only('guest');
$router->delete('/session', 'controllers/session/destroy.php')->only('auth');

$router->get('/register', 'controllers/registration/create.php')->only('guest');
$router->post('/register', 'controllers/registration/store.php')->only('guest');


// ------------------------------ Products routes

$router->get('/products', 'controllers/products/index.php')->only('auth');
$router->get('/product', 'controllers/products/show.php')->only('auth');
$router->delete('/product', 'controllers/products/destroy.php')->only('auth');

$router->get('/product/edit', 'controllers/products/edit.php')->only('auth');
$router->patch('/product', 'controllers/products/update.php')->only('auth');

$router->get('/products/create', 'controllers/products/create.php')->only('auth');
$router->post('/products', 'controllers/products/store.php')->only('auth');

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

