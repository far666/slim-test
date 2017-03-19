<?php
// DIC configuration

$container = $app->getContainer();

// view renderer
$container['renderer'] = function ($c) {
    $settings = $c->get('settings')['renderer'];
    return new Slim\Views\PhpRenderer($settings['template_path']);
};

// monolog
$container['logger'] = function ($c) {
    $settings = $c->get('settings')['logger'];
    $logger = new Monolog\Logger($settings['name']);
    $logger->pushProcessor(new Monolog\Processor\UidProcessor());
    $logger->pushHandler(new Monolog\Handler\StreamHandler($settings['path'], $settings['level']));
    return $logger;
};

// Service factory for the ORM
$container['db'] = function ($c) {
    $capsule = new \Illuminate\Database\Capsule\Manager;
    $capsule->addConnection($c->get('settings')['db']);

    $capsule->setAsGlobal();
    $capsule->bootEloquent();

    return $capsule;
};

$container->get('db');

$container[App\Controller\BookController::class] = function ($c) {
    // $view = $c->get('view');
    $logger = $c->get('logger');
    $table = $c->get('db')->table('books');
    return new App\Controller\BookController($logger, $table);
};

$container[App\Controller\PersonsController::class] = function ($c) {
    $logger = $c->get('logger');
    return new App\Controller\PersonsController($logger);
};
