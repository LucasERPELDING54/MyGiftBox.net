<?php
namespace gift\api\getApi;
use gift\app\actions\AbstractAction;
use gift\app\services\box\BoxService;
use gift\app\services\prestation\PrestationService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getBoxByApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
    $boxService = new BoxService();

    $box = $boxService->getBoxById($args['id']);
    $prestation = $boxService->getPrestaByBoxId($args['id']);
        /**
         * formater les données des prestations pour avoir uniquement les infos demandées dans le sujet.
         */
    foreach ($prestation as $key => $value) {
        $prestation[$key] = ["libelle"=>$value["libelle"],"description"=>$value["description"],"contenu"=>$value["contenu"]];
    }
    $box = ["id"=>$box["id"],"libelle"=>$box["libelle"],"description"=>$box["description"],"message_kdo"=>$box["message_kdo"],"prestations"=>$prestation];
    $data=["type"=>"resource",
        "box"=>$box
    ];

        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}