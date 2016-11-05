<?php

namespace app\models;

use Yii;
use app\models\Producttype;

/**
 * This is the model class for table "shop_settings".
 *
 * @property integer $id
 * @property string $name
 * @property string $value
 * @property string $description
 */
class Shopsettings extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%shop_settings}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'value', 'description'], 'string', 'max' => 255],
            [['type_id'], 'integer'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название',
            'value' => 'Значение',
            'description' => 'Описание',
            'type_id' => 'Тип товара',
        ];
    }
    
    public function getType(){
        return $this->hasOne(Producttype::className(), ['id' => 'type_id']);
    }
}
