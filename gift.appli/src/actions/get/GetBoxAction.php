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
        

        if ($rq->getMethod() === 'POST') {
            if (isset($rq->getParsedBody()['ajouter_coffret'])) {
                return $rs->withHeader('Location', $this->router->pathFor('coffretBox'))->withStatus(302);
            }

            $nom = $rq->getParsedBody()['nom'];
            $description = $rq->getParsedBody()['description'];
            $cadeau = isset($rq->getParsedBody()['cadeau']);
            $message_cadeau = $rq->getParsedBody()['messageCadeau'];

            return $rs->withHeader('Location', $this->router->pathFor('coffretBox'))->withStatus(302);
        }

        $data = [
            'csrf_token' => CsrfService::generate()
        ];

        $view = Twig::fromRequest($rq);
       
        return  $view->render($rs, 'templateBoxCreation.html.twig' ,$data);
      
    }
}
