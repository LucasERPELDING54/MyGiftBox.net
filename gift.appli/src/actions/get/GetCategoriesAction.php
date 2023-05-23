<?php
namespace gift\app\actions\get;

use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gift\app\models\Categorie;
use Slim\Exception\HttpBadRequestException;
use gift\app\actions\AbstractAction;
use gift\app\services\categorie\CategorieService;
use Slim\Views\Twig;

class GetCategoriesAction extends AbstractAction
{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $service = new CategorieService();
        $cat = $service->getCategories();
        $routeContext = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();
        foreach ($cat as $key => $value) {
            $cat[$key]['url'] = $routeContext->urlFor('getCategoriesByIdAction', ['id' => $value['id']]);
        }
        $data = ['categories' => $cat];
        $view = Twig::fromRequest($request);
        return $view->render($response, 'templateCategories.html.twig', $data);

    }
}