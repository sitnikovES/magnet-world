<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "stick_color_ref".
 *
 * @property string $code
 * @property string $name
 * @property string $ORACAL
 * @property integer $lst
 */
class Colors extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%colors}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['name'], 'required'],
            [['lst'], 'integer'],
            [['code'], 'string', 'max' => 6],
            [['name'], 'string', 'max' => 20],
            [['ORACAL'], 'string', 'max' => 3],
            [['name'], 'unique'],
            [['code'], 'unique'],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'code' => 'RGB-код',
            'name' => 'Название цвета',
            'ORACAL' => 'номер в каталоге Oracal',
            'lst' => 'Очередность отображения',
        ];
    }
}
