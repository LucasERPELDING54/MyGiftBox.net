<?php

use gift\api\getApi\getBoxByApi;
use gift\api\getApi\getCategoriesByApi;
use gift\app\actions\get\GetBoxesAction;
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
    $app->get('/prestation[/]', \gift\app\actions\get\GetPrestationsAction::class)->setName('getPrestationsAction');
    $app->get('/categories/{id:\d+}/prestations', \gift\app\actions\get\GetPrestationByCategorie::class)->setName('getPrestationByCategorie');
    $app->get('/boxes[/]', GetBoxesAction::class);
    $app->get('/api/categories[/]', getCategoriesByApi::class);
    $app->get('/api/boxes/{id:\d+}[/]', getBoxByApi::class);
};
