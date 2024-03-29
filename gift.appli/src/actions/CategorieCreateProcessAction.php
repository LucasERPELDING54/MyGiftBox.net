<?php

namespace gift\app\actions;

use gift\app\services\prestations\PrestationsService;
use gift\app\services\utils\CsrfService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class CategorieCreateProcessAction extends AbstractAction{
    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {

        $post_data = $rq->getParsedBody();

        $token = $post_data['csrf_token'] ?? null;
        try{
            CsrfService::check($token);

        }catch (CsrfService $e){
            throw new HttpBadRequestException($rq, 'csrf token error');
        }
        $categ_data =
        [
            'libelle' => $post_data['categ_lib'] ?? 
                throw new HttpBadRequestException($rq, 'create categorie : Missing libelle'), 
                'description' => $post_data['categ_desc'] ?? 
                throw new HttpBadRequestException($rq, 'create categorie : Missing description')
        ];
        $prestationsService = new PrestationsService();
        $prestationsService->createCategorie($categ_data);

        $routePerser = RouteContext::fromRequest($rq)->getRouteParser();
        $url = $routeParser->urlFor('categorie');
        return $rs->withHeader('location', $url)->withStatus(302);
    }
}