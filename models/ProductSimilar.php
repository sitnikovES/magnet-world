<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_similar}}".
 *
 * @property integer $id
 * @property integer $product_id
 * @property integer $similar_product_id
 */
class ProductSimilar extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_similar}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'similar_product_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_id' => 'Товар',
            'similar_product_id' => 'Похожий товар',
        ];
    }
}
