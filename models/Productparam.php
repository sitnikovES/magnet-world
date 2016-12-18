<?php

namespace app\models;

use Yii;
use app\models\Producttype;

/**
 * This is the model class for table "mw_product_param".
 *
 * @property integer $id
 * @property integer $product_type_id
 * @property string $name
 * @property integer $active
 * @property integer $pos
 * @property integer $have_set
 * @property string $hint
 * @property string $def_value
 */
class Productparam extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static $valueType = ['Число', 'Набор значений', 'Строка', 'Текст'];
    
    public static function tableName()
    {
        return '{{%product_param}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_type_id', 'active', 'name'], 'required'],
            [['product_type_id', 'active', 'pos' ,'have_set'], 'integer'],
            [['name', 'hint', 'def_value'], 'string', 'max' => 255],
            [['pos', 'have_set'], 'default', 'value' => 0],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'product_type_id' => 'Тип товара',
            'name' => 'Наименование',
            'active' => 'Отображать',
            'pos' => 'Очередность',
            'have_set' => 'Тип значения',
            'hint' => 'Подсказка',
            'def_value' => 'Значение по умолчанию',
        ];
    }

    public function getProducttype(){
        return $this->hasOne(Producttype::className(), ['id' => 'product_type_id']);
    }
}
