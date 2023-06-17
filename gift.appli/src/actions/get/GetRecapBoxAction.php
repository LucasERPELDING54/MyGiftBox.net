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
        
        $data = $rq->getParsedBody();
        $data['libelle'] = filter_var($data['nom']);
        $data['description'] = filter_var($data['description']);
        if(isset($data['cadeau'])){
            $data['kdo'] =  1;
            $data['message_kdo'] = filter_var($data['messageCadeau'])?? null;
        }else{
            $data['kdo'] = 0; 
            $data['message_kdo'] = '';
        }
   
        $boxService = new BoxService();
        $boxService = $boxService->createBox($data);

        $view = Twig::fromRequest($rq);
       
        return  $view->render($rs, 'templateRecapCoffret.html.twig' ,$data);
      
    }
}
