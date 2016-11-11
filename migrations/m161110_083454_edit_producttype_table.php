<?php

use yii\db\Migration;

class m161110_083454_edit_producttype_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%product_type}}', 'weight', $this->float()->comment('Вес м.кв.'));
    }

    public function down()
    {
        //echo "m161110_083454_edit_producttype_table cannot be reverted.\n";
        $this->dropColumn('{{%product_type}}', 'weight');
        return false;
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
