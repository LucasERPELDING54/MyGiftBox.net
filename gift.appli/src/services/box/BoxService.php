<?php

namespace gift\app\services\box;

use gift\app\models\Box;
use gift\app\models\Categorie;
use Ramsey\Uuid\Uuid;

class BoxService {

    function create(array $donnee) : void {
        $box = new Box();
        $box->id = Uuid::uuid4()->toString();
        $box->libelle = $donnee['libelle'];
        $box->description = $donnee['description'];

        $box->save();
    }

    function getBoxes() : array {
        $box = Box::all();
        return $box->toArray();
    }

    function getBoxById(string $id) : array {
        $box = Box::where('id', $id)->first();
        return $box->toArray();
    }

    function getPrestaByBoxId(string $id) : array {
        $box = Box::where('id', $id)->first();
        $presta = $box->prestations()->get();
        return $presta->toArray();
    }

}