<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "luser".
 *
 * @property integer $id
 * @property string $username
 * @property string $email
 */
class Luser extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'luser';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['username', 'email'], 'required'],
            [['username', 'email'], 'unique'],
            [['username', 'email'], 'string', 'max' => 255],

            ['username', 'match', 'pattern' => '#^[a-z0-9_-]+$#i'],
            ['email', 'email'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'username' => 'Username',
            'email' => 'Email',
        ];
    }
}
