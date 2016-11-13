<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "post_ref".
 *
 * @property integer $id
 * @property string $name
 * @property string $url
 * @property integer $price
 */
class Postcompany extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%post}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['price', 'def', 'active'], 'integer'],
            [['name'], 'string', 'max' => 20],
            [['url'], 'string', 'max' => 255],
            [['price'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Способ доставки',
            'url' => 'Сайт компании',
            'price' => 'Стоимость',
            'def' => 'По умолчанию',
            'active' => 'Отображать',
        ];
    }
}
