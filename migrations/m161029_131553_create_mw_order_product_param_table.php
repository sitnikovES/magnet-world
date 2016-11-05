<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_order_product_param`.
 */
class m161029_131553_create_mw_order_product_param_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%order_product_param}}', [
            'id' => $this->primaryKey(),
            'order_content_id' => $this->integer()->comment('Позиция в заказе'),
            'product_param_id' => $this->integer()->comment('Параметр'),
            'value' => $this->string()->comment('Значение'),
            'price' => $this->integer()->comment('Стоимость позиции'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%order_product_param}}');
    }
}
