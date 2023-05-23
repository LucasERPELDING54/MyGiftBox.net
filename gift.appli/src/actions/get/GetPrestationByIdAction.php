<?php

namespace gift\app\actions\get;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gift\app\models\Prestation;
use Slim\Exception\HttpBadRequestException;

use gift\app\actions\AbstractAction;
use gift\app\services\prestation\PrestationService;
use Slim\Routing\RouteContext;
use Slim\Views\Twig;

class GetPrestationByIdAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {

        $prestationService = new PrestationService();
        if(!isset($request->getQueryParams()['id']) ){
            throw new HttpBadRequestException($request, "La prestation n'existe pas");
        }
        try  {
            $prestation = $prestationService->getPrestationById($request->getQueryParams()['id']);

        }catch (HttpBadRequestException $e) {
            $response->getBody()->write($e->getMessage());
            return $response->withStatus(400);
        }
        $routeParser = RouteContext::fromRequest($request)->getRouteParser();
        $basePath = RouteContext::fromRequest($request)->getBasePath();
        echo $basePath;
        $prestation['url'] = $basePath . '/img/' . strtolower($prestation['libelle']).'.jpg';

        $data = ['prestation' => $prestation];

        $view = Twig::fromRequest($request);
        return $view->render($response, 'templatePrestationById.html.twig', $data);
    }


}