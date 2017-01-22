<?php

use yii\db\Migration;

class m170122_153616_add_collumn_orderkey_to_orders_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%orders}}', 'order_key', $this->string()->comment('Идентификатор заказа'));
    }

    public function down()
    {
        $this->dropColumn('{{%orders}}', 'order_key');
    }

    /*
    // Use safeUp/safeDown to run migration code within a transaction
    public function safeUp()
    {
    }

    public function safeDown()
    {
    }
    */
}
