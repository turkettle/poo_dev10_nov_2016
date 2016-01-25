<?php

use Szenis\Router;

require __DIR__.'/../vendor/autoload.php';

/**
 * display errors
 */
error_reporting(E_ALL);
ini_set('display_errors', 1);

/**
 * initialize the router class
 */
$router = new Router();

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

/**
 * resolve the route
 * the resolve function will search for an matching route
 * when a matching route is found the given function will be triggerd. 
 * lets asume we have triggerd the route: /user/10
 * the function `show` from the class `UserController` will be called
 * the wildcard which is the number `10` will be passed on to the `show` function
 */
$router->resolve([
    'uri' => $_SERVER['REQUEST_URI'],
    'method' => $_SERVER['REQUEST_METHOD'],
]);