<?php

namespace gift\app\services\box;

use gift\app\models\Box;
use gift\app\models\Box2Presta;
use gift\app\models\Categorie;
use gift\app\models\Prestation;
use gift\app\services\prestation\PrestationService;
use Ramsey\Uuid\Uuid;

class BoxService {

    function createBox(array $donnee){

        Box::where('id', 1)->delete();
         Box2Presta::where('box_id', 1)->delete();

        $box = new Box();
        $box->id = 1;
        $box->libelle = $donnee['libelle'];
        $box->description = $donnee['description'];
        $box->kdo = $donnee['kdo'];
        $box->message_kdo = $donnee['message_kdo'];
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

    function updateBoxPrestation($boxId, $prestaId, $qtt){
        
        try {
            Box2Presta::where('box_id', 1)->delete();
            $box = Box::with('prestations')->findOrFail($boxId);
            $presta = Prestation::findOrFail($prestaId);
            $boxContent = $box->prestations;
            
            if($boxContent->contains($presta)){
                $pivot = $box->prestations()->find($prestaId)->pivot;
                $pivot->quantite += $qtt;
                $pivot->save();
            }else{
                $box->prestations()->attach($prestaId, ['quantite' => $qtt]);
            }
            
            $box->montant += $presta->tarif * $qtt;
            $box->save();
        } catch (Exception $e) {
            throw new Exception("Erreur lors de la mise à jour de la prestation dans la box");
        }   
    }
    
    function getPrestaByBoxId(string $id) : array {
        $box = Box::where('id', $id)->first();
        $presta = $box->prestations()->get();
        return $presta->toArray();
    }

}