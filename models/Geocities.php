<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%geo_cities}}".
 *
 * @property integer $id
 * @property string $name
 * @property string $region
 * @property string $federal_region
 * @property double $latitude
 * @property double $longitude
 */
class Geocities extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%geo_cities}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['latitude', 'longitude'], 'number'],
            [['name', 'region', 'federal_region'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'name' => 'Название наспеленного пункта',
            'region' => 'Регион',
            'federal_region' => 'Федеральный округ',
            'latitude' => 'Широта',
            'longitude' => 'Долгота',
        ];
    }
}
