<?php
namespace gift\app\actions\get;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gift\app\models\Categorie;use Slim\Exception\HttpBadRequestException;
use gift\app\actions\AbstractAction;
use gift\app\services\categorie\CategorieService;
use Slim\Views\Twig;

class GetCategoriesByIdAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {

        if(!isset($args['id'])){
            throw new HttpBadRequestException($request);
        }
        else {
            $categorieService = new CategorieService();
            $cat = $categorieService->getCategorieById($args['id']);


        }
        $routeContext = \Slim\Routing\RouteContext::fromRequest($request);

        $url = $routeContext->getRouteParser()->urlFor('getPrestationByCategorie', ['id' => $args['id']]);
        $cat['url_prestation'] = $url;

        $view = Twig::fromRequest($request);
        return $view->render($response, 'templateCatByIdAction.html.twig', $cat);
    }
}