<?php

// Autoloading de composer.
require 'vendor/autoload.php';

use Aston\Factory\EntityFactory;

$book = EntityFactory::get('bd');
$book->setTitle('RUBRIQUE-À-BRAC. 1');
$book->setIllustrator('Alexis');
Kint::dump($book);
// $book->save();

print '<br/>Hello world !!';
