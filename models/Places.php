<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "places_ref".
 *
 * @property integer $id
 * @property string $name
 * @property integer $type
 * @property integer $in_list
 * @property string $title
 * @property string $description
 * @property string $keywords
 * @property string $h1
 * @property integer $active
 */
class Places extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return 'places_ref';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['type', 'in_list', 'active'], 'integer'],
            [['name'], 'string', 'max' => 50],
            [['title', 'description', 'keywords', 'h1'], 'string', 'max' => 255],
            [['name'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Name',
            'type' => 'Type',
            'in_list' => 'In List',
            'title' => 'Title',
            'description' => 'Description',
            'keywords' => 'Keywords',
            'h1' => 'H1',
            'active' => 'Active',
        ];
    }
}
