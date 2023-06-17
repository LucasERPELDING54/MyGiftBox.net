<?php
namespace gift\app\actions\get;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gift\app\models\Prestations;
use Slim\Exception\HttpBadRequestException;
use gift\app\actions\AbstractAction;
use gift\app\services\prestation\PrestationService;
use Slim\Views\Twig;

class GetPrestationsAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {


       


        $service = new PrestationService();
        $cat = $service->getPrestations();
        $routeContext = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        foreach ($cat as $key => $value) {
            $cat[$key]['url'] = $routeContext->urlFor('getPrestationsAction', ['id' => $value['id']]);
        }
        $data = [
            'prestation' => $cat
        ];
        $view = Twig::fromRequest($request);
        return $view->render($response, 'templatePrestations.html.twig', $data);

    }
}