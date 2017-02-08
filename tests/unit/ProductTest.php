<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 08.02.2017
 * Time: 16:13
 */

namespace tests\unit;

use app\models\Product;

class ProductTest {
    protected function assert($condition, $message = ''){
        echo $message;
        if($condition){
            echo ' ok' . PHP_EOL;
        }
        else {
            echo ' fail' . PHP_EOL;
            exit();
        }
    }

    public function testValidateEmptyValues(){

        $product = new Product();

        $this->assert($product->validate() == false, 'model is not valid');
        $this->assert(array_key_exists('name', $product->getErrors()), 'check name error');
        $this->assert(array_key_exists('name_translit', $product->getErrors()), 'check name_translit error');
        $this->assert(array_key_exists('product_type_id', $product->getErrors()), 'check product_type_id error');
    }
}