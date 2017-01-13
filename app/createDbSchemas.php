<?php
/**
 * Created by PhpStorm.
 * User: aston
 * Date: 13/01/17
 * Time: 14:33
 */

require dirname(__DIR__) . '/vendor/autoload.php';

use Aston\Core\ServiceContainer;

$c = ServiceContainer::getInstance();
$capsule = $c->get('capsule');

$capsule->schema()->dropIfExists('book');
$capsule->schema()->dropIfExists('author');
$capsule->schema()->dropIfExists('genre');

$capsule->schema()->create('author', function ($table) {
    $table->increments('id');
    $table->timestamps();
    $table->string('title', 50);
    $table->text('body')->nullable();
});

$capsule->schema()->create('genre', function ($table) {
    $table->increments('id');
    $table->timestamps();
    $table->string('title', 50);
    $table->text('body')->nullable();
});

$capsule->schema()->create('book', function ($table) {
    $table->increments('id');
    $table->timestamps();
    $table->string('title', 50);
    $table->unsignedInteger('author_id')->nullable();
    $table->foreign('author_id')->references('id')->on('author')->OnDelete('SET NULL');
    $table->text('body')->nullable();
    $table->unsignedInteger('genre_id')->nullable();
    $table->foreign('genre_id')->references('id')->on('genre')->OnDelete('SET NULL');
});