<?php

$router->add('/', 'GET', function () {

    $loader = new Twig_Loader_Filesystem('../templates');

    $twig = new Twig_Environment($loader, array(
        // 'cache' => '/path/to/compilation_cache',
        'debug' => true,
    ));

    return $twig->render('home.html.twig');
});

$router->add('/book/list', 'GET', function () {

    $loader = new Twig_Loader_Filesystem('../templates');

    $twig = new Twig_Environment($loader, array(
        // 'cache' => '/path/to/compilation_cache',
        'debug' => true,
    ));

    return $twig->render('book_list.html.twig', ['books' => $books]);
});

// $router->add('/book/add', 'GET|POST', function () {
//
//     $loader = new Twig_Loader_Filesystem('../templates');
//
//     $twig = new Twig_Environment($loader, array(
//         // 'cache' => '/path/to/compilation_cache',
//         'debug' => true,
//     ));
//
//     return $twig->render('book_form.html.twig');
// });
//
// $router->add('form/book/add', 'POST', function () {
//     Kint::dump($GLOBALS, $_SERVER);
// });

// $router->add('/docs/{*:url}', 'GET', function($url) {
// 	return $url;
// });
//
// $router->add('/hello/{a:firstname}/{?:lastname}', 'GET', function($firstname, $lastname = '') {
// 	return 'hello '.$firstname.' '.$lastname;
// });
//
// $router->add('/user/{a:id}/edit', 'GET|POST', 'App\Controllers\UserController::show');