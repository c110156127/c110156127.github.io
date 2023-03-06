<?php
$router->register('getUsers', 'Employee', 'getUsers');
$router->register('newUsers', 'Employee', 'newUsers');
$router->register('removeUsers', 'Employee', 'removeUsers');
$router->register('updateUsers', 'Employee', 'updateUsers');
$router->register('getproducts', 'product', 'getproducts');
$router->register('newproducts', 'product', 'newproducts');
$router->register('removeproducts', 'product', 'removeproducts');
$router->register('updateproducts', 'product', 'updateproducts');
$router->register('getroles', 'role', 'getroles');
$router->register('newroles', 'role', 'newroles');
$router->register('removeroles', 'role', 'removeroles');
$router->register('updateroles', 'role', 'updateroles');
$router->register('getsupplys', 'supply', 'getsupplys');
$router->register('newsupplys', 'supply', 'newsupplys');
$router->register('removesupplys', 'supply', 'removesupplys');
$router->register('updatesupplys', 'supply', 'updatesupplys');
?>