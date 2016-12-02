<?php

use Aston\Core\Database;
use Aston\Factory\EntityFactory;
use Aston\Core\ServiceContainer;

$router->add('/', 'GET', function () {

    $twig = ServiceContainer::getInstance()->get('twig');
    return $twig->render('home.html.twig');
});

$router->add('/book/list', 'GET', function () {

    $twig = ServiceContainer::getInstance()->get('twig');
    $db = Database::getConnection('PDO');
    $manager = new \Aston\Manager\BookEntityManager($db);
    $books = $manager->getLastEntities(0, 10);

    return $twig->render('book_list.html.twig', ['books' => $books]);
});

$router->add('/book/add', 'GET', function () {

    $twig = ServiceContainer::getInstance()->get('twig');
    return $twig->render('book_form.html.twig');
});

$router->post('/book/post/add', function () {
    $entity = EntityFactory::get('paperback');
    $entity->hydrate($_POST);
    $entity->save();
    header('Location: /book/add');
});

// $router->add('/docs/{*:url}', 'GET', function($url) {
// 	return $url;
// });
//
// $router->add('/hello/{a:firstname}/{?:lastname}', 'GET', function($firstname, $lastname = '') {
// 	return 'hello '.$firstname.' '.$lastname;
// });
//
// $router->add('/user/{a:id}/edit', 'GET|POST', 'App\Controllers\UserController::show');