<?php

namespace gift\app\actions\get;

use gift\app\services\prestations\PrestationsService;
use gift\app\services\utils\CsrfService;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use Slim\Views\Twig;

class CategorieFormAction extends AbstractAction{
    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface {

    $data = [
            'csrf_token' => CsrService::generate()
            ];
    $view = Twig::fromRequest($rq);

    return $view->render($rs, 'categorieCreateView.twig', array_merge($data, $this->getGlobalTemplateVar($rq)));
        
    }
}