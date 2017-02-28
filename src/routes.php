<?php
// Routes

// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

//for practice
$app->get('/book', function ($request, $response, $args) {
    // include_once("../app/controller/BookController.php");
    $controller = $this->get('App\Controller\BookController'); //@FIXME: find a way to autoload class
    
    $result = $controller->find(1);

    echo "<pre>";
    print_r($result);
    echo "</pre>";
    exit;
});
