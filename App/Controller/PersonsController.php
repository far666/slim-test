<?php

namespace App\Controller;

//use Slim\Views\Twig;
//use Psr\Log\LoggerInterface;
// use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PersonsController
{
    public function __construct(
    ) {
    }

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

    public function show(Request $request, Response $response, $args)
    {
        $response = $response->withJson($person->toArray());
        return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        $params = $request->getParams();
        $person = \App\Models\Person::create($params);
        $response = $response->withJson($person->toArray());

        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $person = \App\Models\Person::find($args['id']);
        $params = $request->getParams();
        $person->update($params);
        $response = $response->withJson($person->toArray());

        return $response;
    }

    public function destroy(Request $request, Response $response, $args)
    {
        $person = \App\Models\Person::find($args['id']);
        $person->update(array("deleted_at" => date("Y-m-d H:i:s")));

        return $response;
    }
}
