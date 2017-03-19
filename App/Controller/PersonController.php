<?php

namespace App\Controller;

//use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class PersonController
{
    // private $view;
    private $logger;
    protected $table;

    public function __construct(
        // Twig $view,
        LoggerInterface $logger
        // Builder $table
    ) {
        // $this->view = $view;
        $this->logger = $logger;
        // $this->table = $table;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $method = $args['method'];
        $this->$method($args);
        return $response;
    }

    public function index(Request $request, Response $response, $args)
    {
        $persons = \App\Models\Person::all();
        $response = $response->withJson($persons->toArray());
        return $response;
    }

    public function find(Request $request, Response $response, $args)
    {
        $person = \App\Models\Person::find($args['id']);
        $response = $response->withJson($person->toArray());
        return $response;
    }

    public function descriptions(Request $request, Response $response, $args)
    {
        $person = \App\Models\Person::find($args['id']);
        $desc_array = $person->descriptions->toArray();
        $response = $response->withJson($desc_array);           
        return $response;
    }
}