<?php
namespace gift\app\actions\set;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use gift\app\models\Prestation;
use Slim\Exception\HttpBadRequestException;
use gift\app\actions\AbstractAction;


class SetPrestation extends AbstractAction{


    


    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $prestation = new Prestation();
        // id, libelle, description, url, unite, tarif, img, cat_id
        $prestation->libelle = $request->getParsedBody()['libelle'];
        $prestation->description = $request->getParsedBody()['description'];
        $prestation->url = $request->getParsedBody()['url'];
        $prestation->unite = $request->getParsedBody()['unite'];
        $prestation->tarif = $request->getParsedBody()['tarif'];
        $prestation->img = $request->getParsedBody()['img'];
        $prestation->cat_id = $request->getParsedBody()['cat_id'];
        $prestation->save();
        $response->getBody()->write(json_encode($prestation));
        return $response;
    }
}