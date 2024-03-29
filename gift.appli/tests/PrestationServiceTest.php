<?php
declare(strict_types=1);

namespace gift\tests;

use Faker\Factory;
use gift\app\models\Categorie;
use gift\app\models\Prestation;
use gift\app\services\prestation\PrestationService;
use \PHPUnit\Framework\TestCase;
use Illuminate\Database\Capsule\Manager as DB ;

final class PrestationServiceTest extends TestCase
{

    private static array $prestations  = [];
    private static array $categories = [];

    public static function setUpBeforeClass(): void
    {
        parent::setUpBeforeClass();

        $db = new DB();
        $db->addConnection(parse_ini_file(__DIR__ . '../../src/conf/gift.db.test.ini'));
        $db->setAsGlobal();
        $db->bootEloquent();
        
        $faker = \Faker\Factory::create('fr_FR');

        $c1= Categorie::create([
            'libelle' => $faker->word(),
            'description' => $faker->paragraph(3)
        ]);
        $c2=Categorie::create([
            'libelle' => $faker->word(),
            'description' => $faker->paragraph(4)
        ]);
        self::$categories= [$c1, $c2];

        for ($i=1; $i<=4; $i++) {
            $p=Prestation::create([
                'id' => $faker->uuid(),
                'libelle' => $faker->word(),
                'description' => $faker->paragraph(3),
                'tarif' => $faker->randomFloat(2, 20, 200),
                'unite' => $faker->numberBetween(1, 3)
            ]);
            array_push(self::$prestations, $p);
        }


        self::$prestations[0]->categorie()->associate($c1); self::$prestations[0]->save();
        self::$prestations[1]->categorie()->associate($c1); self::$prestations[1]->save();
        self::$prestations[2]->categorie()->associate($c2); self::$prestations[2]->save();
        self::$prestations[3]->categorie()->associate($c2); self::$prestations[3]->save();



    }

    public static function tearDownAfterClass(): void
    {
        foreach (self::$categories as $c) {
            $c->delete();
        }
        foreach (self::$prestations as $prestation) {
            $prestation->delete();
        }

    }


    public function testgetCategories(): void {

        $prestationService = new PrestationService();
        $testcategories = $prestationService->getCategoriesAction();

        $this->assertEquals(count(self::$categories), count($testcategories));
        $this->assertEquals(self::$categories[0]['id'], $testcategories[0]['id']);
        $this->assertEquals(self::$categories[0]['libelle'], $testcategories[0]['libelle']);
        $this->assertEquals(self::$categories[0]['description'], $testcategories[0]['description']);
        $this->assertEquals(self::$categories[1]['libelle'], $testcategories[1]['libelle']);
        $this->assertEquals(self::$categories[1]['description'], $testcategories[1]['description']);
        $this->assertEquals(self::$categories[1]['id'], $testcategories[1]['id']);
    }

    public function testgetCategorieById(): void {

        $prestationService = new PrestationService();
        $categorie = $prestationService->getCategorieByID(self::$categories[0]['id']);

        $this->assertEquals(self::$categories[0]['id'], $categorie['id']);
        $this->assertEquals(self::$categories[0]['libelle'], $categorie['libelle']);
        $this->assertEquals(self::$categories[0]['description'], $categorie['description']);

        $this->expectException(\gift\app\services\prestation\PrestationServiceNotFoundException::class);
        $prestationService->getCategorieByID(-1);
    }

    public function testgetPrestationById(): void
    {
        $prestationService = new PrestationService();
        $prestation = $prestationService->getPrestationById(self::$prestations[0]['id']);

        $this->assertEquals(self::$prestations[0]['id'], $prestation['id']);
        $this->assertEquals(self::$prestations[0]['libelle'], $prestation['libelle']);
        $this->assertEquals(self::$prestations[0]['description'], $prestation['description']);
        $this->assertEquals(self::$prestations[0]['tarif'], $prestation['tarif']);
        $this->assertEquals(self::$prestations[0]['unite'], $prestation['unite']);

        $this->expectException(\gift\app\services\prestation\PrestationServiceNotFoundException::class);
        $prestationService->getPrestationById('AAAAAAA');
    }



}