<?php

namespace App\Controller;

use Slim\Views\Twig;
use Psr\Log\LoggerInterface;
use Illuminate\Database\Query\Builder;
use Psr\Http\Message\ServerRequestInterface as Request;
use Psr\Http\Message\ResponseInterface as Response;

class BookController
{
    // private $view;
    private $logger;
    protected $table;

    public function __construct(
        // Twig $view,
        LoggerInterface $logger,
        Builder $table
    ) {
        // $this->view = $view;
        $this->logger = $logger;
        $this->table = $table;
    }

    public function __invoke(Request $request, Response $response, $args)
    {
        $books = $this->table->get();

        $this->view->render($response, 'app/index.twig', [
            'books' => $books
        ]);

        return $response;
    }

    public function find($id)
    {
        return $this->table->find($id);
    }
}