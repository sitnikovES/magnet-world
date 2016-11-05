<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "pay_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 */
class Paytype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%pay_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'string', 'max' => 20],
            [['active'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Способ оплаты',
            'active' => 'Использовать данный вид платежа',
        ];
    }
}
