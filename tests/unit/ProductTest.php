<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 08.02.2017
 * Time: 16:13
 */

namespace tests\unit;

use app\models\Product;
use app\modules\admin\modules\products\products;
use tests\TestCase;
use Yii;

class ProductTest extends \PHPUnit_Extensions_Database_TestCase {
//class ProductTest extends \PHPUnit_Framework_TestCase {
//class ProductTest extends TestCase {

    public function getConnection()
    {
//        print_r($GLOBALS);
        // TODO: Implement getDataSet() method.
        $pdo = new \PDO('sqlite:' . __DIR__ . '/../data/test.db', '', '');
        return $this->createDefaultDBConnection($pdo, '');
        /*$pdo = new \PDO($GLOBALS['DB_DSN'], $GLOBALS['DB_USER'], $GLOBALS['DB_PASSWD']);
        return $this->createDefaultDBConnection($pdo, $GLOBALS['DB_DBNAME']);*/
    }

    public function getDataSet()
    {
        // TODO: Implement getConnection() method.
        return $this->createXMLDataSet(dirname(__FILE__) . '/../_data/product.xml');
    }

    public static function setUpBeforeClass(){
        //
    }

    public function setUp(){
        parent::setUp();

       /* Product::deleteAll();
        Yii::$app->db->createCommand()->insert(Product::tableName(),[
            'active' => 1,
            'name_translit' => 'martishka_i_ochki',
            'name' => 'unique',
            'product_type_id' => 1,
        ])->execute();*/
    }

    public function tearDown(){

    }

    public function testValidateEmptyValues(){

        $product = new Product();

        $this->assertFalse($product->validate(), 'model is not valid');
        $this->assertArrayHasKey('name', $product->getErrors(), 'check name error');
        $this->assertArrayHasKey('name_translit', $product->getErrors(), 'check name_translit error');
        $this->assertArrayHasKey('product_type_id', $product->getErrors(), 'check product_type_id error');
        $this->assertArrayHasKey('active', $product->getErrors(), 'check active error');
    }

    public function testValidateWrongValues(){
        $product = new Product([
            'active' => 'g',
            'name_translit' => 'Wrong % name_translit ',
            'name' => 'Wrong % name',
        ]);
        $this->assertFalse($product->validate(), 'validate incorrect active and name_translit:');
        $this->assertArrayHasKey('active', $product->getErrors(), 'check incorrect active error:');
        $this->assertArrayHasKey('name_translit', $product->getErrors(), 'check incorrect name_translit error:');
        $this->assertArrayHasKey('name', $product->getErrors(), 'check incorrect name error:');
    }

    public function testValidateCorrectValues(){
        $product = new Product([
            'active' => 1,
            'name_translit' => 'martishka_i_ochki',
            'name' => 'dgfg',
            'product_type_id' => 1,
        ]);
        $this->assertTrue($product->validate(), 'correct model is valid:');
    }


    public function testSaveIntoDatabase(){
        $product = new Product([
            'active' => 1,
            'name_translit' => 'martishka',
            'name' => 'martishka',
            'product_type_id' => 1,
        ]);
        $this->assertTrue($product->save(), 'model is saved');
    }

    public function testUniqueValidation(){
        $product = new Product([
            'active' => 1,
            'name_translit' => 'dasha',
            'name' => 'dasha',
            'product_type_id' => 1,
        ]);
        $this->assertFalse($product->validate(), 'test unique name validation');
    }
}