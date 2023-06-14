<?php

namespace gift\app\services\connexion;

use gift\app\models\Connexion;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConnexionService
{
    function getData($identifiant, $password)
    {
        try {
            return Connexion::where('identifiant', '=', $identifiant, 'and')->where('password', '=', $password)->firstOrFail();
        }catch (ModelNotFoundException $e){
            return false;
        }
    }

}