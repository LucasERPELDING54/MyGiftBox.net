<?php

use gift\api\getCategoriesByApi;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {
    $app->get('/', function (Request $request, Response $response, array $args) {
        $response->getBody()->write("Hello world!");
        return $response;
    });

    $app->get('/categories[/]', \gift\app\actions\get\GetCategoriesAction::class)->setName("categories");
    $app->get('/categories/{id:\d+}[/]', \gift\app\actions\get\GetCategoriesByIdAction::class)->setName('getCategoriesByIdAction');
    $app->get('/prestations[/]', \gift\app\actions\get\GetPrestationByIdAction::class)->setName('getPrestationByIdAction');
    $app->get('/categories/{id:\d+}/prestations', \gift\app\actions\get\GetPrestationByCategorie::class)->setName('getPrestationByCategorie');
    $app->get('/boxes[/]', GetBoxesAction::class);
    $app->get('/api/categories[/]', getCategoriesByApi::class);
};
