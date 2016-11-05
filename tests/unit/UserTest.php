<?php
namespace tests\unit;

use Yii;
use app\models\Luser;

//class UserTest extends \PHPUnit_Framework_TestCase {
class UserTest extends \tests\TestCase{
    public function setUp(){
        parent::setUp();
        Luser::deleteAll();
        Yii::$app->db->createCommand()->insert(Luser::tableName(),[
            'username' => 'unique',
            'email' => 'unique@email.com',
        ])->execute();
    }

    public function tearDown(){

    }

    public function testValidateEmptyValues(){
        $user = new Luser();
        $this->assertFalse($user->validate(), 'model is not valid:');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check username error:');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check email error:');
    }

    public function testValidateWrongValues(){
        $user = new Luser([
            'username' => 'Wrong % Username',
            'email' => 'Wrong email',
        ]);
        $this->assertFalse($user->validate(), 'validate incorrect username and email:');
        $this->assertArrayHasKey('username', $user->getErrors(), 'check incorrect username error:');
        $this->assertArrayHasKey('email', $user->getErrors(), 'check incorrect email error:');
    }

    public function testValidateCorrectValues(){
        $user = new Luser([
            'username' => 'somename',
            'email' => 'mail@mail.ru',
        ]);
        $this->assertTrue($user->validate(), 'validate correct username and email:');
    }

    public function testSaveIntoDatabase(){
        $user = new Luser([
            'username' => 'TestUserName',
            'email' => 'test@email.com'
        ]);
        $this->assertTrue($user->save(), 'model is saved');
    }

    public function testUniqueValidation(){
        $user = new Luser([
            'username' => 'unique',
            'email' => 'unique@email.com'
        ]);
        $this->assertFalse($user->validate(), 'test unique username and email validation');
        $this->assertArrayHasKey('username', $user->getErrors(), 'test unique username validation');
        $this->assertArrayHasKey('email', $user->getErrors(), 'test unique email validation');
    }
}