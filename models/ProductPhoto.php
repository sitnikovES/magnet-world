<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mw_product_photo".
 *
 * @property integer $id
 * @property integer $product_id
 * @property string $filename
 * @property integer $hide
 * @property string $alt
 * @property string $title
 */
class ProductPhoto extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'mw_product_photo';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_id', 'hide'], 'integer'],
            [['filename'], 'required'],
            [['hide'], 'default', 'value' => 0],
            [['filename', 'alt', 'title'], 'string', 'max' => 255],
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
            'filename' => 'Имя файла',
            'hide' => 'Показывать',
            'alt' => 'Описание',
            'title' => 'Подпись к фото',
        ];
    }

    public function getProduct(){
        return $this->hasOne(Product::className(), 'id', 'product_id');
    }
}
