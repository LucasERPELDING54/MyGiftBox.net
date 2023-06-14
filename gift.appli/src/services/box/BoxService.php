<?php

namespace gift\app\services\box;

use gift\app\models\Box;
use gift\app\models\Categorie;
use gift\app\models\Prestation;
use gift\app\services\prestation\PrestationService;
use Ramsey\Uuid\Uuid;

class BoxService {

    function create(array $donnee){
        $box = new Box();
        $box->id = Uuid::uuid4()->toString();
        $box->libelle = $donnee['libelle'];
        $box->description = $donnee['description'];

        $box->save();
        return $box;
    }

    function getBoxes() : array {
        $box = Box::all();
        return $box->toArray();
    }

    function getBoxById(string $id) : array {
        $box = Box::where('id', $id)->first();
        return $box->toArray();
    }

<<<<<<< HEAD
    function addPrestation($boxId, $prestaId, $qtt){
        try{
            $box = Box::with('prestations')->findOrFail($boxId);
            $presta = Prestation::findOrFail($prestaId);
            $boxContent = $box->prestations;
            if($boxContent->contains($presta)){
                $box->prestations()->find($prestaId)->pivot->quantite+= $qtt;
            }else{
                $box->prestations()->attach($prestaId, ['quantite' => $qtt]);
            }
            $box->montant += $presta->tarif * $qtt;
            $box->save();
        }catch(Error $e){
            throw new Error("erreur lors de l'ajout de la prestation à la box");
        }
    }
=======
    function getPrestaByBoxId(string $id) : array {
        $box = Box::where('id', $id)->first();
        $presta = $box->prestations()->get();
        return $presta->toArray();
    }

>>>>>>> fcc7a170080ed96c4db57cdb01853fc46277b3b1
}