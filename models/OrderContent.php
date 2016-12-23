<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mw_order_content".
 *
 * @property integer $id
 * @property integer $order_id
 * @property integer $product_id
 * @property integer $cnt
 * @property integer $price
 */
class OrderContent extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%order_content}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['order_id', 'product_id', 'cnt', 'price'], 'integer'],
            [['order_id', 'product_id', 'cnt', 'price'], 'required'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'order_id' => 'Код заказа',
            'product_id' => 'Товар',
            'cnt' => 'Количество(шт)',
            'price' => 'Стоимость за единицу',
        ];
    }

    public function getProduct(){
        return $this->hasOne(Product::className(), ['id' => 'product_id']);
    }

    public function addParam($product_param_id, $value){
        $param = new OrderProductParam();
        $param->order_content_id = $this->id;
        $param->product_param_id = $product_param_id;
        $param->value = $value;
        $param->save();
    }
}
