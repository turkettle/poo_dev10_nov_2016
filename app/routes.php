<?php

use Aston\Factory\EntityManagerFactory;
use Aston\Core\ServiceContainer;
use Aston\Entity\BookEntity;
use Aston\Entity\AuthorEntity;

$router->add('/', 'GET', function () {

    $twig = ServiceContainer::getInstance()->get('twig');
    return $twig->render('home.html.twig');
});

$router->add('/book/list', 'GET', function () {

    $twig = ServiceContainer::getInstance()->get('twig');
    $manager = EntityManagerFactory::get('BookEntity');
    $books = $manager->getLastEntities(0, 10);
    
    $entities = [];
    if ($books) {
        foreach ($books as $book) {
            $entities[] = BookEntity::create($book);
        }
    }

    return $twig->render('book_list.html.twig', ['books' => $entities]);
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

$router->add('/book/delete/{n:id}', 'GET', function ($id) {

    $twig = ServiceContainer::getInstance()->get('twig');
    return $twig->render('confirm.html.twig', ['id' => $id]);
});

$router->post('/book/post/add', function () {
    
    $entity = BookEntity::create($_POST);
    $entity->save();
    header('Location: /book/add');
});

$router->post('/book/delete/confirm', function () {
    $entity = BookEntity::load($_POST['id']);
    $entity->delete();
    header('Status: 200 OK', false, 200);
    header('Location: /book/list');
});

$router->add('/author/add', 'GET', function () {
    
    $twig = ServiceContainer::getInstance()->get('twig');
    return $twig->render('author_form.html.twig');
});

$router->post('/author/post/add', function () {
    
    $entity = AuthorEntity::create($_POST);
    $entity->save();
    header('Status: 200 OK', false, 200);
    header('Location: /author/add');
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