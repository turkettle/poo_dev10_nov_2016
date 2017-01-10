<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 30/11/16
 * Time: 16:46
 */

try {
    /**
     * Initialize the router
     */
    $router = new Szenis\Router();

    /**
     * Require the routes
     */
    require __DIR__ . '/../app/routes.php';

    /**
     * Initialize the resolver
     */
    $resolver = new Szenis\RouteResolver($router);

    /**
     * resolve the route
     * the resolve function will search for an matching route
     * when a matching route is found the given function will be triggerd.
     * lets asume we have triggerd the route: /user/10
     * the function `show` from the class `UserController` will be called
     * the wildcard which is the number `10` will be passed on to the `show` function
     */
    $response = $resolver->resolve([
        'uri' => $_SERVER['REQUEST_URI'],
        'method' => $_SERVER['REQUEST_METHOD'],
    ]);

    echo $response;

} catch (Szenis\Exceptions\RouteNotFoundException $e) {
    // route not found, add a nice 404 page here if you like
    die($e->getMessage());
} catch (Szenis\Exceptions\InvalidArgumentException $e) {
    // an exception has been caught, you could log it in a log file and show an 'something went wrong' page
    die($e->getMessage());
}