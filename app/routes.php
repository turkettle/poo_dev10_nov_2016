<?php

use Aston\Factory\EntityManagerFactory;
use Aston\Core\ServiceContainer;
use Aston\Entity\BookEntity;
use Aston\Entity\AuthorEntity;
use Slim\Csrf\Guard;
use Respect\Validation\Validator as v;
use Respect\Validation\Exceptions\NestedValidationException;

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
    
    \kint::dump($_SESSION);
    
    // Génération d'un token CSRF avec Slim CSRF.
    $slimGuard = new Guard;
    $slimGuard->validateStorage();
    
    // Generate new tokens
    $csrfNameKey = $slimGuard->getTokenNameKey();
    $csrfValueKey = $slimGuard->getTokenValueKey();
    $keyPair = $slimGuard->generateToken();
    
    // Validate retrieved tokens
    // $slimGuard->validateToken($_POST[$csrfNameKey], $_POST[$csrfValueKey]);
    
    $token = [
        'name' => $csrfNameKey,
        'value' => $csrfValueKey,
        'keypair' => $keyPair,
    ];
    
    $twig = ServiceContainer::getInstance()->get('twig');
    
    return $twig->render('book_form.html.twig', ['token' => $token, 'errors' => $_SESSION['errors']]);
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
    
    // Validation CSRF.
    if (key_exists($_POST['csrf_name'], $_SESSION['csrf'])) {
        if ($_SESSION['csrf'][$_POST['csrf_name']] != $_POST['csrf_value']) {
            header('Location: /');
        }
    } else {
        header('Location: /');
    }
    
    $errors = [];
    try {
        v::stringType()->length(1, 50)->assert($_POST['title']);
    } catch (NestedValidationException $exception) {
        $errors['title'] = $exception->getMessages();
    }
    
    if ($errors) {
        $_SESSION['errors'] = $errors;
        header('Location: /book/add');
    }
    
    // $entity = BookEntity::create($_POST);
    // $entity->save();
    // header('Location: /book/add');
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