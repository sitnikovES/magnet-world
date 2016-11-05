<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%order_product_param}}".
 *
 * @property integer $id
 * @property integer $order_content_id
 * @property integer $product_param_id
 * @property string $value
 */
class OrderProductParam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_product_param}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_content_id', 'product_param_id'], 'integer'],
            [['value'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_content_id' => 'Позиция в заказе',
            'product_param_id' => 'Параметр',
            'value' => 'Значение',
        ];
    }
    
    public function getParam(){
        return $this->hasOne(Productparam::className(), ['id' => 'product_param_id']);
    }
}
