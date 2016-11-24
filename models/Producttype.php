<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "mw_product_type".
 *
 * @property integer $id
 * @property string $name
 * @property string $mname
 * @property integer $active
 * @property integer $pos
 * @property string $rakel
 * @property string $title
 * @property string $caption
 * @property string $keywords
 * @property string $description
 * @property string $text
 * @property string $name_translit
 * @property string $price_formula
 * @property double $weight
 */
class Producttype extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_type}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name', 'mname'], 'unique'],
            [['active', 'pos', 'rakel'], 'number'],
            [['weight'], 'double'],
            [['text'], 'string'],
            [['name', 'mname', 'title', 'caption', 'keywords', 'description', 'name_translit', 'price_formula'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Наименование (ед.ч)',
            'mname' => 'Наименование (мн.ч)',
            'active' => 'Отображать',
            'pos' => 'Позиция',
            'rakel' => 'Нужен ракель',
            'title' => 'Title',
            'caption' => 'Заголовок',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'text' => 'Текст',
            'name_translit' => 'Наименование с транслите',
            'price_formula' => 'Формула рачета стоимости',
            'weight' => 'Вес (кг/м.кв.)',
        ];
    }

    public function getThemes(){
        return $this->hasMany(Productthema::className(), ['product_type_id' => 'id']);
    }
}
