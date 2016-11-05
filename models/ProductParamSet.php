<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mw_product_param_set".
 *
 * @property integer $id
 * @property string $name
 * @property integer $active
 * @property integer $product_param_id
 * @property string $hint
 */
class ProductParamSet extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_param_set}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'product_param_id'], 'integer'],
            [['name', 'hint'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Значение',
            'active' => 'Отображать',
            'product_param_id' => 'Параметр товара',
            'hint' => 'Описание',
        ];
    }
}
