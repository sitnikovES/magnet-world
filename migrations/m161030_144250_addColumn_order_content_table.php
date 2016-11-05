<?php

use yii\db\Migration;

class m161030_144250_addColumn_order_content_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%order_content}}', 'price', $this->integer()->defaultValue(0)->comment('Цена за единицу'));
    }

    public function down()
    {
        $this->dropColumn('{{%order_content}}', 'price');
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
