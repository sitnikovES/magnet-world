<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mw_cashflow".
 *
 * @property integer $id
 * @property integer $type
 * @property string $description
 * @property integer $order_id
 * @property double $value
 */
class Cashflow extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%cashflow}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'order_id'], 'integer'],
            [['order_id'], 'required'],
            [['value'], 'number'],
            [['description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'type' => 'Вид операции',
            'description' => 'Краткое описание действия',
            'order_id' => 'Номер заказа',
            'value' => 'Сумма(руб.)',
        ];
    }

    public function getTypename(){
        if($this->type){
            return 'Приход';
        }
        return 'Расход';
    }
}
