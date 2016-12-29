<?php

namespace app\models;

use Yii;
use yii\db\ActiveQuery;

/**
 * This is the model class for table "pay_type".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 * @property integer $def
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
            [['name'], 'string', 'max' => 30],
            [['active'], 'default', 'value' => 0],
            [['def'], 'integer'],
            [['def'], 'default', 'value' => 0],
            [['def'], 'in', 'range' => [0, 1]],
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
            'def' => 'Использовать по умолчанию',
        ];
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        if($this->def) {
            Paytype::updateAll(['def' => 0], ['<>', 'id', $this->id]);
        }
        return true;
    }
}
