<?php

namespace gift\app\actions;

use gift\app\models\Connexion;
use gift\app\services\connexion\ConnexionService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;
use Slim\Views\Twig;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;


class ConnexionAction extends AbstractAction
{

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __invoke(Request $request, Response $response, array $args): Response
    {
        $connexion = new ConnexionService();
        $data = $request->getQueryParams();
        if(isset($data['login']) && isset($data['password'])){
            $result = $connexion->getData($data['login'], $data['password']);
            if($result != false){
                $result = json_decode($result, true);
                $_SESSION['Co'] = 'true';
                $view = Twig::fromRequest($request);
                return $view->render($response, 'connexion.html.twig', $result);
            }else{
                $view = Twig::fromRequest($request);
                return $view->render($response, 'connexion.html.twig');
            }





        }else{
            $view = Twig::fromRequest($request);
            return $view->render($response, 'connexion.html.twig');

        }






    }
}