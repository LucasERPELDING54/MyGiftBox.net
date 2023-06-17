<?php

namespace gift\app\actions\get;

use gift\app\actions\AbstractAction;
use Psr\Http\Message\ResponseInterface;
use Psr\Http\Message\ServerRequestInterface;
use gift\app\services\utils\CsrfService;
use gift\app\services\box\BoxService;
use Slim\Views\Twig;

class GetBox2PrestaProcess extends AbstractAction
{
    public function __invoke(ServerRequestInterface $rq, ResponseInterface $rs, array $args): ResponseInterface
    {
        $data = $rq->getParsedBody();
        if (isset($data['presta'])) {
            $prestaId = $data['presta'];          
        } else {
         
        }
        
    
        
        $boxService = new BoxService();
        $boxService = $boxService->updateBoxPrestation(1,2,30);
        
        $view = Twig::fromRequest($rq);
        
        return $view->render($rs, 'templateRecapCoffret.html.twig', $data);
        
    }
}
