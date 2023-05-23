<?php
namespace gift\app\services\prestation;

use gift\app\models\Prestation;
use gift\app\models\Categorie;
use Slim\Exception\HttpBadRequestException;


class PrestationService {

    public function GetCategoriesByIdAction() : array {
        return Categorie::all()->toArray();
    }

    public function getCategorieByID( $id) : array {
        
        try {
            return Categorie::findOrFail($id)->toArray();
        }catch(ModelNotFoundException $e) {
            throw new HttpBadRequestException($request, "L'id de la catégorie n'est pas renseigné");
        }
    }

    public function getPrestationById( $id) : array {
        try {
            return Prestation::findOrFail($id)->toArray();
        }catch(ModelNotFoundException $e) {
            throw new HttpBadRequestException($request, "L'id de la prestation n'est pas renseigné");
        }
    }

    public function getPrestationByCategorieId( $id) : array {
        try {
            return Prestation::where('cat_id', $id)->get()->toArray();
        }catch(ModelNotFoundException $e) {
            throw new HttpBadRequestException($request, "L'id de la catégorie n'est pas renseigné");
        }
    }

    public function getPrestationByActionId( $id) : array {
        try {
            $prestation = Categorie::findOrFail($id)->toArray();
            return $prestation;
        }catch (\Exception $e) {
            throw new HttpBadRequestException($request, "L'id de la catégorie n'est pas renseigné");
        }
       
    }
}

