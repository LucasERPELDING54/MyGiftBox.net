<?php

use gift\api\getApi\getBoxByApi;
use gift\api\getApi\getCategoriesByApi;
use gift\app\actions\get\GetBoxAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

return function (\Slim\App $app): void {


    $app->get('/', \gift\app\actions\ConnexionAction::class)->setName('connexion');
    $app->get('/categories[/]', \gift\app\actions\get\GetCategoriesAction::class)->setName("categories");
    $app->get('/categories/{id:\d+}[/]', \gift\app\actions\get\GetCategoriesByIdAction::class)->setName('getCategoriesByIdAction');
    $app->get('/prestations[/]', \gift\app\actions\get\GetPrestationByIdAction::class)->setName('getPrestationByIdAction');
    $app->get('/prestation[/]', \gift\app\actions\get\GetPrestationsAction::class)->setName('getPrestationsAction');
    $app->get('/categories/{id:\d+}/prestations', \gift\app\actions\get\GetPrestationByCategorie::class)->setName('getPrestationByCategorie');
    $app->get('/boxes[/]', \gift\app\actions\get\GetBoxAction::class)->setName("boxes");
    $app->get('/api/categories[/]', getCategoriesByApi::class);
    $app->get('/api/boxes/{id:\d+}[/]', getBoxByApi::class);
    $app->get('/api/prestations[/]', \gift\api\getApi\getPrestationByApi::class);
    $app->get('/api/categories/{id:\d+}/prestations', \gift\api\getApi\getPrestationByCategorieApi::class);
    $app->post('/boxes/recapBox', \gift\app\actions\get\GetRecapBoxAction::class)->setName("recapBox");
    $app->post('/boxes/box2Presta', \gift\app\actions\get\GetBox2PrestaProcess::class)->setName("box2Presta");



};
    