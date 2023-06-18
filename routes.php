// ------------------------------ Products routes

$router->get('/products', 'controllers/products/index.php')->only('auth');
$router->get('/product', 'controllers/products/show.php')->only('auth');
$router->delete('/product', 'controllers/products/destroy.php')->only('auth');

$router->get('/product/edit', 'controllers/products/edit.php')->only('auth');
$router->patch('/product', 'controllers/products/update.php')->only('auth');

$router->get('/products/create', 'controllers/products/create.php')->only('auth');
$router->post('/products', 'controllers/products/store.php')->only('auth');