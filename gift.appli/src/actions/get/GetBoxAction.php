<?php

namespace gift\app\actions\get;

use gift\app\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use gift\app\services\utils\CsrfService;
use Slim\Views\Twig;

class GetBoxAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface
    {

        $data = [
            'csrf_token' => CsrfService::generate()
        ];

        $view = Twig::fromRequest($rq);
       
        return  $view->render($rs, 'templateBoxCreation.html.twig' ,$data);
      
    }
}
