<?php

use Aston\Manager\BookEntityManager;
use Aston\Core\Database;

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
    $twig->addExtension(new Twig_Extension_Debug());


    $db = Database::getConnection('PDO');
    $manager = new \Aston\Manager\BookEntityManager($db);
    $books = $manager->getLastEntities(0, 10);

    return $twig->render('book_list.html.twig', ['books' => $books]);
});

$router->add('/book/add', 'GET', function () {

    $loader = new Twig_Loader_Filesystem('../templates');

    $twig = new Twig_Environment($loader, array(
        // 'cache' => '/path/to/compilation_cache',
        'debug' => true,
    ));

    return $twig->render('book_form.html.twig');
});

// $router->post('form/book/add', function () {
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