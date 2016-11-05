<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_orders`.
 */
class m161028_032946_create_mw_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('mw_orders', [
                'id' => $this->primaryKey(),
                'created_at' => $this->integer(),
                'updated_at' => $this->integer(),
                'name' => $this->string()->comment('Ф.И.О.')->notNull(),
                'phone' => $this->string()->comment('Ф.И.О.')->notNull(),
                'address' => $this->string()->comment('Почтовый адрес')->notNull(),
                'email' => $this->string()->comment('E-mail'),
                'postindex' => $this->integer()->comment('Почтовый индекс'),
                'order_status_id' => $this->integer()->comment('Статус заказа'),
                'pay_type_id' => $this->integer()->comment('Способ оплаты'),
                'post_type_id' => $this->integer()->comment('Способ доставки'),
                'post_code' => $this->string()->comment('Номер почтового отправления'),
            ],
            'CHARACTER SET utf8'
    );
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%orders}}');
    }
}
