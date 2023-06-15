<?php

namespace gift\tests;


use Faker\Factory;
use gift\app\models\Box;
use gift\app\models\Prestation;
use gift\app\services\utils\Eloquent;
use gift\app\services\box\BoxService;
use PHPUnit\Framework\Attributes\DataProvider;
use PHPUnit\Framework\Attributes\Depends;
use Illuminate\Database\Capsule\Manager as DB ;

class BoxServiceTest extends \PHPUnit\Framework\TestCase{
    private static array $boxIds=[];
    private static array $prestations=[];
    
    public static function setUpBeforeClass():void{
        parent::setUpBeforeClass();
        $db = new DB();
        $db->addConnection(parse_ini_file(__DIR__ . '../../src/conf/gift.db.test.ini'));
        $db->setAsGlobal();
        $db->bootEloquent();

        $faker = \Faker\Factory::create('fr_FR');

        for($i=1;$i<=4;$i++){
            $p=Prestation::create([
                'id'=>$faker->uuid(),
                'libelle'=>$faker->word(),
                'description'=>$faker->paragraph(3),
                'tarif'=>$faker->randomFloat(2,20,200),
                'unite'=>$faker->numberBetween(1,3)
            ]);
            array_push(self::$prestations, $p);
        }

        foreach(self::$prestations as $prestation){
            $prestation->save();
        }
    }

    public static function tearDownAfterClass(): void{
        foreach(self::$prestations as $prestation) {
            $prestation->delete();
        }
        foreach(self::$boxIds as $boxId){
            $boxId->delete();
        }
    }

    public function testCreateBox():void{
        $faker = \Faker\Factory::create('fr_FR');
        $boxService = new BoxService();
        $libelle = $faker->word();
        $description = $faker->paragraph(3);
        $donnee = [
            'libelle' => $libelle,
           'description' => $description
        ];
        
        /*
        *   Vérification des données
        */
        $box = $boxService->create($donnee);
        $this->assertTrue($libelle==$box['libelle']);
        $this->assertTrue($description==$box['description']);

        $box_inserted = $boxService->getBoxById($box['id']);
        array_push(self::$boxIds,$box_inserted['id']);

        /*
        *   Vérification de l'ajout de la box dans la table
        */

        $boxDB = Box::with('prestations')->find($box['id']);

        $this->assertEquals($box['id'],$boxDB->id);


        /*
        *   Vérification qu'aucune prestation n'est associé au coffret
        */
        $this->assertEquals(0,sizeof($box->prestations()->get()));
    }

    public function testAddToBox(): void{
        $faker = \Faker\Factory::create('fr_FR');
        $boxService = new BoxService();
        $libelle = $faker->word();
        $description = $faker->paragraph(3);
        $donnee = [
            'libelle' => $libelle,
           'description' => $description
        ];

        $box = $boxService->create($donnee);
        $prestation = Prestation::findOrFail('2ca48e78-b08e-3d6b-b0e5-e792973e31e2');
        
        
        /*
        *   Vérification de l'ajout de la prestation à la box
        */

        $boxService->addPrestation($box->id,$prestation['id'],2);
        $box2presta = $box->prestations()->get();
        
        $this->assertEquals(1,sizeof($box2presta));

        /*
        *   Vérification des montants
        */

        $this->assertEquals($box2presta[0]->quantite*$prestation['tarif'],$box->tarif);
    }
}