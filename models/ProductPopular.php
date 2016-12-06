<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_popular}}".
 *
 * @property integer $id
 * @property integer $product_id
 */
class ProductPopular extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_popular}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Продукт',
        ];
    }
}
