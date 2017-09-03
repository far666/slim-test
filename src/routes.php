<?php

// Routes
$app->get("/", \App\Controller\IndexController::class . ":index");
$app->get("/index", \App\Controller\IndexController::class . ":index");

createRouters($app, "persons", \App\Controller\PersonsController::class);
createRouters($app, "descriptions", \App\Controller\PersonDescriptionsController::class, "/persons/{person_id}");
createRouters($app, "relationship", \App\Controller\RelationshipController::class);
createRouters($app, "relationship_type", \App\Controller\RelationshipTypeController::class);

function createRouters($app, $controller, $resources, $prefix = "")
{
	$app->get("{$prefix}/{$controller}[.json]", $resources . ":index");
	$app->post("{$prefix}/{$controller}[.json]", $resources . ":create");
	$app->get("{$prefix}/{$controller}/{id}", $resources . ":show");
	$app->map(["PUT", "PATCH"], "{$prefix}/{$controller}/{id}", $resources . ":update");
	$app->delete("{$prefix}/{$controller}/{id}", $resources . ":destroy");
}
