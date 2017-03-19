<?php
// Routes

// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

//for practice
// $app->get('/book', function ($request, $response, $args) {
//     $controller = $this->get('App\Controller\BookController');
    
//     $result = $controller->find(1);

//     echo "<pre>";
//     print_r($result);
//     echo "</pre>";
//     exit;
// });

$app->get('/persons[.json]', \App\Controller\PersonController::class . ":index");
$app->get('/persons/{id}', \App\Controller\PersonController::class . ":show");
$app->get('/persons/{id}/descriptions[.json]', \App\Controller\PersonController::class . ":descriptions");
// $app->get('/persons/{person_id}/descriptions', \App\Controller\PersonDescriptionController::class . ":index");


