<?php

$router->add('/', 'GET', function() {
	return '<h2>Greetings</h2>';
});

$router->add('/user/{a:id}/edit', 'GET|POST', 'App\Controllers\UserController::show');