<?php

namespace gift\app\services\connexion;

use gift\app\models\Connexion;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class ConnexionService
{
    function getData($identifiant, $password)
    {
        try {
            return Connexion::where('identifiant',$identifiant, 'and')->where('Password', $password)->firstOrFail();

           // return Connexion::where('identifiant',$identifiant)->first();
        }catch (Q $e){
            return false;
        }
    }

}