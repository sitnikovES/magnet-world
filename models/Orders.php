<?php

namespace app\models;

use Yii;
use yii\behaviors\TimestampBehavior;
use app\models\OrderStatus;
use app\models\Paytype;
use app\models\Postcompany;

/**
 * This is the model class for table "mw_orders".
 *
 * @property integer $id
 * @property string $created_at
 * @property string $updated_at
 * @property string $name
 * @property string $phone
 * @property string $address
 * @property string $email
 * @property integer $postindex
 * @property integer $order_status_id
 * @property integer $pay_type_id
 * @property integer $post_type_id
 * @property string $post_code
 * @property string $note
 */
class Orders extends \yii\db\ActiveRecord
{
    /**
     * @inheritdoc
     */
    public static function tableName()
    {
        return '{{%orders}}';
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['created_at', 'updated_at'], 'safe'],
            [['name', 'phone', 'address', 'email', 'post_type_id', 'postindex', 'pay_type_id'], 'required'],
            [['postindex', 'order_status_id', 'pay_type_id', 'post_type_id'], 'integer'],
            [['name', 'phone', 'address', 'email', 'post_code'], 'string', 'max' => 255],
            [['note'], 'string'],
            [['email'], 'email'],
            [['post_type_id', 'order_status_id'], 'default', 'value' => 1],
            [['pay_type_id'], 'default', 'value' => 2],
        ];
    }

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'id' => 'ID',
            'created_at' => 'Дата создания',
            'updated_at' => 'Дата редактирования',
            'name' => 'Имя',
            'phone' => 'Телефон',
            'address' => 'Адрес (область, город, улица, дом)',
            'email' => 'E-mail',
            'postindex' => 'Почтовый индекс',
            'order_status_id' => 'Статус заказа',
            'pay_type_id' => 'Способ оплаты',
            'post_type_id' => 'Способ отправки',
            'post_code' => 'Код отправления',
            'note' => 'Примечание к заказу',
        ];
    }

    public function behaviors(){
        return [
            TimestampBehavior::className()
        ];
    }

    public function getPostcompany(){
        return $this->hasOne(Postcompany::className(), ['id' => 'post_type_id']);
    }

    public function getPaytype(){
        return $this->hasOne(Paytype::className(), ['id' => 'pay_type_id']);
    }

    public function getStatus(){
        return $this->hasOne(OrderStatus::className(), ['id' => 'order_status_id']);
    }
}
