<?php

namespace App\Controller;

//use Slim\Views\Twig;
//use Psr\Log\LoggerInterface;
//use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PersonDescriptionsController
{
    public function __construct(
    ) {

    public function __invoke(Request $request, Response $response, $args)
    {
        return $response;
    }

    public function index(Request $request, Response $response, $args)
    {
        $persons = \App\Models\Person::all();
        $response = $response->withJson($persons->toArray());
        return $response;
    }
}