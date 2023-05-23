<?php

require_once __DIR__ . '/../vendor/autoload.php';

use Ramsey\Uuid\Uuid;

\gift\app\services\utils\Eloquent::init(__DIR__ . '/../conf/gift.db.conf.ini');

/**
 * question 1
 */
echo "question 1" . PHP_EOL;
foreach (\gift\app\models\Prestation::all() as $presta) {
    echo $presta->libelle . PHP_EOL;
    echo $presta->description . PHP_EOL;
    echo $presta->tarif . PHP_EOL;
    echo $presta->unite . PHP_EOL;
    echo "-----------------" . PHP_EOL;
}
echo "end : question 1" . PHP_EOL;
/**
 * question 2
 */
echo "question 2" . PHP_EOL;
foreach (\gift\app\models\Prestation::with('categorie')
         ->get() as $presta) {
    echo $presta->libelle . "({$presta->categorie->libelle}" . PHP_EOL;
    echo $presta->description . PHP_EOL;
    echo $presta->tarif . PHP_EOL;
    echo $presta->unite . PHP_EOL;
    echo "-----------------" . PHP_EOL;
}
echo "end : question 2" . PHP_EOL;
/**
 * question 3
 * afficher la catégorie 3 (libellé) et la liste des prestations
 * (libellé, tarif, unité) de cette catégorie.
 * On utilisera impérativement la méthode implantant l'association.
 */
echo "question 3" . PHP_EOL;
$cat3 = \gift\app\models\Categorie::find(3);
echo $cat3->libelle . PHP_EOL;
foreach ($cat3->prestations()->get() as $presta) {
    echo $presta->libelle . PHP_EOL;
    echo $presta->tarif . PHP_EOL;
    echo $presta->unite . PHP_EOL;
    echo "-----------------" . PHP_EOL;
}
echo "end : question 3" . PHP_EOL;

/**
 * question 4
 * afficher la box d'ID 360bb4cc-e092-3f00-9eae-774053730cb2 :
 * libellé, description, montant.
 */
echo "question 4" . PHP_EOL;
$box = \gift\app\models\Box::find('360bb4cc-e092-3f00-9eae-774053730cb2');
echo $box->libelle . PHP_EOL;
echo $box->description . PHP_EOL;
echo $box->montant . PHP_EOL;
echo "end : question 4" . PHP_EOL;

/**
 * question 5
 *idem, en affichant en plus les prestations prévues
 * dans la box (libellé, tarif, unité, quantité).
 */
echo "question 5" . PHP_EOL;
$box = \gift\app\models\Box::with('prestations')
->where('id', '=','360bb4cc-e092-3f00-9eae-774053730cb2')
->first();
echo $box->libelle . PHP_EOL;
echo $box->description . PHP_EOL;
echo $box->montant . PHP_EOL;

foreach ($box->prestations as $presta) {
    echo $presta->libelle . PHP_EOL;
    echo $presta->tarif . PHP_EOL;
    echo $presta->unite . PHP_EOL;
    echo $presta->contenu->quantite . PHP_EOL;
    echo "-----------------" . PHP_EOL;
}
echo "end : question 5" . PHP_EOL;

/**
 * question 6
 * Créer une box et lui ajouter 3 prestations.
 */
echo "question 6" . PHP_EOL;

$box = new \gift\app\models\Box();
$box->id = Uuid::uuid4()->toString();
$box->libelle = 'box 6';
$box->description = 'description box 6';
$box->token = base64_encode(random_bytes(32));


$box->save();
$box->prestations()->attach([
    '4cca8b8e-0244-499b-8247-d217a4bc542d' => ['quantite' => 2],
    'a277c67f-eb06-40a3-bc06-0d067159e886' => ['quantite' => 2],
    '95a72f23-2ee7-4cbe-98d0-3d372102fcae' => ['quantite' => 3],
]);
