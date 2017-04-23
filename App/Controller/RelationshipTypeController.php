<?php

namespace App\Controller;

//use Slim\Views\Twig;
//use Psr\Log\LoggerInterface;
// use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class RelationshipTypeController
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
        $relatoinship_types = \App\Models\RelationshipType::all();
        $response = $response->withJson($relatoinship_types->toArray());
        return $response;
    }

    public function show(Request $request, Response $response, $args)
    {
        $relatoinship_type = \App\Models\RelationshipType::find($args['id']);
        $response = $response->withJson($relatoinship_type->toArray());
        return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        $params = $request->getParams();
        $relatoinship_type = \App\Models\RelationshipType::create($params);
        $response = $response->withJson($relatoinship_type->toArray());

        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $relatoinship_type = \App\Models\RelationshipType::find($args['id']);
        $params = $request->getParams();
        $relatoinship_type->update($params);
        $response = $response->withJson($relatoinship_type->toArray());

        return $response;
    }

    public function destroy(Request $request, Response $response, $args)
    {
        $relatoinship_type = \App\Models\RelationshipType::find($args['id']);
        $relatoinship_type->update(array("deleted_at" => date("Y-m-d H:i:s")));

        return $response;
    }
}
