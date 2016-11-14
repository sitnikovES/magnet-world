<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "{{%geo_cidr_optim}}".
 *
 * @property integer $id
 * @property integer $block_begin
 * @property integer $block_end
 * @property string $ip_range
 * @property string $country
 * @property integer $city_id
 */
class Geocidroptim extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%geo_cidr_optim}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['block_begin', 'block_end', 'city_id'], 'integer'],
            [['ip_range', 'country'], 'string', 'max' => 255],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'block_begin' => 'Начало блока',
            'block_end' => 'Конец блока',
            'ip_range' => 'Диапазон',
            'country' => 'Код страны',
            'city_id' => 'Код города',
        ];
    }

    public function getCity(){
        return $this->hasOne(Geocities::className(), ['id' => 'city_id']);
    }
}
