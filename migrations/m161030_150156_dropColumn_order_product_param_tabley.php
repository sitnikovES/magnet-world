<?php

use yii\db\Migration;

class m161030_150156_dropColumn_order_product_param_tabley extends Migration
{
    public function up()
    {
        $this->dropColumn('{{%order_product_param}}', 'price');
    }

    public function down()
    {
        $this->addColumn('{{%order_product_param}}', 'price', $this->integer()->defaultValue(0)->comment('Цена за единицу'));
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
