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

// for debug
$container['errorHandler'] = function ($c) {
    return function ($request, $response, $exception) use ($c) {
        // log error here
        print_R($exception->getMEssage());
        return $c['response']->withStatus(404)
            ->withHeader('Content-Type', 'application/json')
            ->withJson(array("status" => false, "message" => "page not found"));
    };
};

$container['phpErrorHandler'] = function ($c) {
    return function ($request, $response, $error) use ($c) {
        // log error here
        // print_R($error->getMEssage());
        return $c['response']->withStatus(500)
            ->withHeader('Content-Type', 'application/json')
            ->withJson(array("status" => false, "message" => "page not found 2"));
    };
};