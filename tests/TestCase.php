<?php
namespace tests;

class TestCase {
    protected function assert($condition, $message = ''){
        echo $message;
        if($condition) {
            echo ' ok'. PHP_EOL;
        } else {
            echo ' Fail' . PHP_EOL;
            exit();
        }
    }

    public function setUp(){

    }

    public function tearDown(){

    }

    protected function assertTrue($condition, $message = ''){
        $this->assert($condition === true, $message);
    }

    protected function assertFalse($condition, $message = ''){
        $this->assert($condition === false, $message);
    }

    protected function assertArrayHasKey($key, $array, $message = ''){
        $this->assert(array_key_exists($key, $array), $message);
    }
}