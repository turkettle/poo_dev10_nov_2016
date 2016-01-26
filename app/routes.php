<?php

/**
 * add a route to the homepage
 * the first argument is the route that we want to look for
 * the second argument is an array, every key in this array is required.
 */
$router->add('/', [
    'method' => ['GET', 'PUT'],                   // array of accepted methods, atleast 1.
    'class' => 'App\Controllers\PageController',  // full namespace to your class
    'function' => 'index',                        // name of the method inside the class
]);

/**
 * add a route with a wildcard
 * it is posible to add multiple wildcards in one route
 */
$router->add('/user/{id}', [
    'method' => ['GET'],
    'class' => 'App\Controllers\UserController',
    'function' => 'show',
]);