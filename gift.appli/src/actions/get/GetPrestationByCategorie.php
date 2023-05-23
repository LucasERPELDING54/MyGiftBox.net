<?php
namespace gift\app\actions\get;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gift\app\models\Categorie;
use gift\app\actions\AbstractAction;
use gift\app\services\prestation\PrestationService;
use Slim\Views\Twig;

class GetPrestationByCategorie extends AbstractAction{
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        
        
        if(isset($args['id']) && !is_numeric($args['id'])){
            throw new HttpBadRequestException($request, "La catégorie n'existe pas");
        }
        $service = new PrestationService();
        $prestation = $service->getPrestationByCategorieId($args['id']);

        $routeParser = \Slim\Routing\RouteContext::fromRequest($request)->getRouteParser();

        foreach ($prestation as $index => $presta) {
            $prestation[$index]['url'] = '/prestations/?id='.$presta['id'];

        }
        $data = ['categ_id' => $args['id'], 'presta_liste' => $prestation ];
        $view = Twig::fromRequest($request);
        return $view->render($response, 'templatePrestationByCategorie.html.twig', $data);
        

    }
}