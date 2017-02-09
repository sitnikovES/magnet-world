<?php
namespace tests;
use tests\unit;

use app\models\Product;

require(__DIR__ . '/_bootstrap.php');

$class = new \ReflectionClass('\tests\unit\ProductTest');
foreach($class->getMethods() as $method){
    if(substr($method->name, 0, 4) == 'test'){
        echo 'Test' . $method->class . '::' . $method->name . PHP_EOL . PHP_EOL;
        /** @var TestCase $test */
        $test = new $method->class;
        $test->setUp();
        $test->{$method->name}();
        $test->tearDown();
        echo PHP_EOL;
    }
}