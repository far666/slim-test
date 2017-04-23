<?php

namespace App\Controller;

//use Slim\Views\Twig;
//use Psr\Log\LoggerInterface;
// use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class RelationshipController
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
        // maybe useless
        $relationships = \App\Models\Relationship::all();
        $response = $response->withJson($relationships->toArray());
        return $response;
    }

    public function show(Request $request, Response $response, $args)
    {
        $result = \App\Models\Relationship::getPersonRelations($args['id']);
        $response = $response->withJson($result);
        return $response;
    }

    public function create(Request $request, Response $response, $args)
    {
        $params = $request->getParams();
        $relationship = \App\Models\Relationship::create($params);
        $response = $response->withJson($relationship->toArray());

        return $response;
    }

    public function update(Request $request, Response $response, $args)
    {
        $params = $request->getParams();
        $params['relationship_type'] = 1;
        $relationship = \App\Models\Relationship::where('hash', $args['id'])->first();
        $relationship->update($params);
        $response = $response->withJson($relationship->toArray());

        return $response;
    }

    public function destroy(Request $request, Response $response, $args)
    {
        $relationship = \App\Models\Relationship::where('hash', $args['id'])->first();
        $relationship->update(array("deleted_at" => date("Y-m-d H:i:s")));

        return $response;
    }

}
