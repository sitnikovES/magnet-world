<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%product_imagesize}}".
 *
 * @property integer $id
 * @property integer $cat
 * @property integer $some_id
 * @property integer $width
 * @property integer $height
 */
class Imagesize extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_imagesize}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['cat', 'some_id', 'width', 'height'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'cat' => 'куда(товар, тема и пр.)',
            'some_id' => 'id по категории',
            'width' => 'Ширина изображения',
            'height' => 'Высота изображения',
        ];
    }

    public function getProducttype(){
        return $this->hasOne(Producttype::className(), ['id' => 'some_id']);
    }
}
