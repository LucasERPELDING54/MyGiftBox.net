<?php

namespace gift\api\getApi;

use gift\app\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gift\app\services\prestation\PrestationService;

class getPrestationByApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $prestationService = new PrestationService();
        $prestation = $prestationService->getPrestations();
        $routeContext = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        foreach ($prestation as $key => $value) {
            $prestation[$key]['links'] = $routeContext->urlFor('getPrestationByIdAction') . '?id=' . $value['id'];
        }
        $data=["type"=>"collection",
            "count"=>count($prestation),
            "prestations"=>$prestation
        ];
        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);

    }
}