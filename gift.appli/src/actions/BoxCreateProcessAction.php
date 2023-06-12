<?php

namespace gift\app\actions;

use gift\app\services\prestations\PrestationsService;
use gift\app\services\utils\CsrfService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class BoxCreateProcessAction extends AbstractAction{
    public function __invoke(ServerRequestInterface $rq,ResponseInterface $rs, array $args):ResponseInterface {

        $post_data = $rq->getParsedBody() ?? null;

        $token = $post_data['csrf_token'] ?? null;
        try{
            CsrfService::check($token);
            
        }catch(CsrfException $e){
            throw new HttpBadRequestExcecption($rq, 'csrf token error');
        }

        
    }
}