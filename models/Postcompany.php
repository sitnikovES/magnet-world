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
 * @property integer $def
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
            [['name'], 'string', 'max' => 30],
            [['url'], 'string', 'max' => 255],
            [['price'], 'default', 'value' => 0],
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
            'name' => 'Способ доставки',
            'url' => 'Сайт компании',
            'price' => 'Стоимость',
            'def' => 'Использовать по умолчанию',
            'active' => 'Отображать',
        ];
    }

    public function afterSave($insert, $changedAttributes){
        parent::afterSave($insert, $changedAttributes);
        if($this->def) {
            Postcompany::updateAll(['def' => 0], ['<>', 'id', $this->id]);
        }
        return true;
    }
}
