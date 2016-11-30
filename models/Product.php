<?php

namespace app\models;

use Yii;
use app\models\Producttype;

/**
 * This is the model class for table "mw_product".
 *
 * @property integer $id
 * @property string $name
 * @property integer $product_type_id
 * @property integer $active
 * @property integer $product_thema_id
 * @property string $name_translit
 * @property string $title
 * @property string $keywords
 * @property string $description
 * @property string $text
 * @property string $image
 */
class Product extends \yii\db\ActiveRecord
{
    public $file;
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%product}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['product_type_id', 'active', 'product_thema_id'], 'integer'],
            //[['product_type_id', 'active', 'product_thema_id', 'name_translit'], 'required'],
            [['text', 'image'], 'string'],
            [['file'], 'file'],
            [['name', 'name_translit', 'title', 'keywords', 'description'], 'string', 'max' => 255],
            [['active'], 'default', 'value' => 0],
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
            'product_type_id' => 'Тип товара',
            'product_thema_id' => 'Тема',
            'active' => 'В продаже',
            'name_translit' => 'Название в транслите',
            'title' => 'Title',
            'keywords' => 'Keywords',
            'description' => 'Description',
            'text' => 'Описание товара',
            'image' => 'Основное изображение товара',
            'file' => 'Основное изображение товара',
        ];
    }

    public function getProducttype(){
        return $this->hasOne(Producttype::className(), ['id' => 'product_type_id']);
    }

    /*public function getThema(){
        return $this->hasOne(Productthema::className(), ['id' => 'product_thema_id']);
    }*/
}
