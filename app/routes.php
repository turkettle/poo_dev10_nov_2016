<?php

$router->add('/', 'GET', function() {
	return '<h2>Greetings</h2>';
});

$router->add('/docs/{*:url}', 'GET', function($url) {
	return $url;
});

$router->add('/hello/{a:firstname}/{?:lastname}', 'GET', function($firstname, $lastname = '') {
	return 'hello '.$firstname.' '.$lastname;
});

$router->add('/user/{a:id}/edit', 'GET|POST', 'App\Controllers\UserController::show');