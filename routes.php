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