<?php

namespace app\modules\admin\models;

use Yii;
use yii\web\IdentityInterface;
use yii\behaviors\TimestampBehavior;

/**
 * This is the model class for table "users".
 *
 * @property integer $id
 * @property string $login
 * @property string $name
 * @property string $email
 * @property integer $role
 * @property integer $status
 * @property string $password_hash
 * @property string $auth_key
 * @property integer $created_at
 * @property integer $updated_at
 */
class User extends \yii\db\ActiveRecord implements \yii\web\IdentityInterface
{
    const STATUS_DELETED = 0;
    const STATUS_NOT_ACTIVE = 1;
    const STATUS_ACTIVE = 10;

    public $password;


    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%users}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['login', 'name', 'email'], 'required'],
            [['role', 'status'], 'integer'],
            [['login', 'name', 'email', 'password_hash', 'auth_key'], 'string', 'max' => 255],
            ['login', 'string', 'min' => 5, 'max' => 20],
            ['password', 'string', 'min' => 5, 'max' => 255],
            [['created_at', 'updated_at'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'login' => 'Логин',
            'name' => 'Имя',
            'email' => 'E-Mail',
            'role' => 'Роль',
            'status' => 'Статус',
            'password_hash' => 'Password Hash',
            'created_at' => 'Создан',
            'updated_at' => 'Редактировался',
            'auth_key' => 'auth_key',
            'password' => 'Пароль',
        ];
    }


    /**
     * Finds an identity by the given ID.
     *
     * @param string|integer $id the ID to be looked for
     * @return IdentityInterface|null the identity object that matches the given ID.
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'status' => self::STATUS_ACTIVE]);
    }

    /**
     * Finds an identity by the given token.
     *
     * @param string $token the token to be looked for
     * @return IdentityInterface|null the identity object that matches the given token.
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['access_token' => $token]);
    }

    /**
     * @return int|string current user ID
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * @return string current user auth key
     */
    public function getAuthKey()
    {
        return $this->auth_key;
    }

    /**
     * @param string $authKey
     * @return boolean if auth key is valid for current user
     */
    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    public function behaviors(){
        return [
            TimestampBehavior::className()
        ];
    }

    static function findByUserName($username){
        return static::findOne(['login' => $username]);
    }


    public function setPassword($password){
        $this->password_hash = Yii::$app->security->generatePasswordHash($password);
    }

    public function generateAuthKey(){
        $this->auth_key = Yii::$app->security->generateRandomString();
    }

    public function validatePassword($password){
        return Yii::$app->security->validatePassword($password, $this->password_hash);
    }


    public function beforeSave($insert){
        if(parent::beforeSave($insert)){
            $this->setPassword($this->password);
            $this->generateAuthKey();
            return true;
        }
        else {
            return false;
        }
    }

    public function getUsername(){
        return $this->login;
    }
}
