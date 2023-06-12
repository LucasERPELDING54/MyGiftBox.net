<?php

namespace gift\api;
use gift\app\services\categorie\CategorieService;
use gift\app\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getCategoriesByApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new CategorieService();
        $cat = $service->getCategories();

        $response->getBody()->write(json_encode($cat));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}