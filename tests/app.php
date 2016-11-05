<?php
namespace tests;
use tests\unit;

require(__DIR__ . '/_bootstrap.php');

$class = new \ReflectionClass('\tests\unit\UserTest');

foreach(scandir(__DIR__ . '/unit') as $file){
    if(substr($file, -8, 8) == 'Test.php'){
        $classname = pathinfo($file, PATHINFO_FILENAME); //возвращает имя с обрезкой расширения\
        $class = new \ReflectionClass('\tests\unit\\' . $classname);
        foreach($class->getMethods() as $metod){
            //if(substr($metod->name, 0, 8) == 'testSave'){
            if(substr($metod->name, 0, 4) == 'test'){
                echo 'Test ' . $metod->class . '::' . $metod->name . PHP_EOL;
                $test = new $metod->class;
                $test->setUp();
                $test->{$metod->name}();
                $test->tearDown();
                echo PHP_EOL;
            }
        }
    }
}