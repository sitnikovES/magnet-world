<?php

namespace app\models;

use Yii;
use app\models\Producttype;

/**
 * This is the model class for table "mw_product_thema".
 *
 * @property integer $id
 * @property string $name
 * @property string $name_translit
 * @property string $product_type_id
 * @property integer $active
 * @property integer $pos
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $text
 */
class Productthema extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product_thema}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['active', 'pos'], 'integer'],
            [['text'], 'string'],
            [['name', 'name_translit', 'product_type_id', 'title', 'keywords', 'description'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            //'id' => 'ID',
            'name' => 'Наименование',
            'name_translit' => 'Наименование в транслите',
            'product_type_id' => 'Тип товара',
            'active' => 'Отображать',
            'pos' => 'Очередность',
            'title' => 'Заголовок страницы',
            'keywords' => 'Ключевые слова',
            'description' => 'Описание страницы',
            'text' => 'Текст',
        ];
    }

    public function getProducttype() {
        return $this->hasOne(Producttype::className(), ['id' => 'product_type_id']);
    }
}
