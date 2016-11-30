<?php

// Autoloading de composer.
// require 'vendor/autoload.php';


function __autoload($class) {

    $class = 'classes/' . str_replace('\\', '/', $class) . '.php';

    if (file_exists($class)) {
        require $class;
    }
}

$book = \Factory\EntityFactory::get('book');
$book->setTitle('RUBRIQUE-À-BRAC. 1');
$book->save();

print '<br/>Hello world !!';
