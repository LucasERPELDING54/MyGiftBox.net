<?php

namespace gift\app\actions;

use Slim\Exception\HttpBadRequestException;
use Slim\Exception\HttpNotFoundException;

class GestionError extends \Exception
{
    public function missArguments($args, $request)
    {
        if (!isset($args['id'])) {
            throw new HttpBadRequestException($request, "L'id de la catégorie n'est pas renseigné");
        }
    }

    public function wrongArgument($args, $request)
    {

            throw new HttpNotFoundException($request, "L'id de la catégorie n'est pas bon");

    }

}