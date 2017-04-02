<?php
// Routes

// $app->get('/[{name}]', function ($request, $response, $args) {
//     // Sample log message
//     $this->logger->info("Slim-Skeleton '/' route");

//     // Render index view
//     return $this->renderer->render($response, 'index.phtml', $args);
// });

createRouters($app, "persons", \App\Controller\PersonsController::class);
createRouters($app, "descriptions", \App\Controller\PersonDescriptionsController::class, "/persons/{person_id}");

function createRouters($app, $controller, $resources, $prefix = "")
{
	$app->get("{$prefix}/{$controller}[.json]", $resources . ":index");
	$app->post("{$prefix}/{$controller}[.json]", $resources . ":create");
	$app->get("{$prefix}/{$controller}/{id}", $resources . ":show");
	$app->map(["PUT", "PATCH"], "{$prefix}/{$controller}/{id}", $resources . ":update");
	$app->delete("{$prefix}/{$controller}/{id}", $resources . ":destroy");
}
