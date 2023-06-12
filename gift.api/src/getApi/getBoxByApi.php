<?php
namespace gift\api\getApi;
use gift\app\actions\AbstractAction;
use gift\app\services\box\BoxService;
use Psr\Http\Message\ResponseInterface as Response;
use Psr\Http\Message\ServerRequestInterface as Request;

class getBoxByApi extends AbstractAction
{

    public function __invoke(Request $request, Response $response, array $args): Response
    {
    $service = new BoxService();
    $box = $service->getBoxById($args['id']);
    $data=["type"=>"resource",
        "count"=>count($box),
        "box"=>$box
    ];

        $response->getBody()->write(json_encode($data));
        return $response->withHeader('Content-Type', 'application/json')->withStatus(200);
    }
}