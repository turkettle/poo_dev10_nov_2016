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

$router->add('/admin/log', 'GET', function () {

    $twig = ServiceContainer::getInstance()->get('twig');
    $log_file = '../log/aston.log';

    $logs = null;
    if (file_exists($log_file)) {
        $content = file_get_contents($log_file);
        $data = explode('[] []', $content);
        $logs = [];

        foreach ($data as $line) {
            $line = trim($line);
            if ($line) {

                $elements = explode(' ', $line);
                $elements[3] = str_replace('+', ' ', $elements[3]);
                $logs[] = $elements;
            }
        }

    }
    return $twig->render('log_admin.html.twig', ['logs' => $logs]);
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