<?php

namespace gift\app\actions\get;

use gift\app\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use gift\app\services\utils\CsrfService;
use gift\app\services\box\BoxService;
use Slim\Views\Twig;

class GetRecapBoxAction extends AbstractAction
{
    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface
    {
        
        if ($rq->getMethod() === 'POST') {
            
            $nom = $rq->getParsedBody()['nom'];
            $description = $rq->getParsedBody()['description'];
            $cadeau = isset($rq->getParsedBody()['cadeau']);
            $message_cadeau = $rq->getParsedBody()['messageCadeau'];

        }


        $data = [
            'nom' => $nom,
            'description' => $description,
            'cadeau' => $cadeau ?? null,
            'message_cadeau' => $message_cadeau ?? null,
        ];

        create();




        $view = Twig::fromRequest($rq);
       
        return  $view->render($rs, 'templateRecapCoffret.html.twig' ,$data);
      
    }
}
