<?php

namespace gift\app\actions\get;

use Slim\Psr7\Request;
use Slim\Psr7\Response;

class GetBoxesAction extends AbstractAction{

    public function __invoke(Request $rq, Response $rs, array $args): Response {
        $html = <<<HTML
            <html>
            <head>
            <title>Boxes</title>
            </head>
            <form method="post">
                <label for="id">ID</label>
                <input type="text" name="id" id="id">
                <input type="submit" value="Envoyer">
            </form>
            </html>
            HTML;

        $rs->getBody()->write($html);
        return $rs;
    }

}