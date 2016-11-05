<?php

use yii\db\Migration;

class m161026_045233_addcol_mw_product_param_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%product_param}}', 'pos', $this->smallInteger());
        $this->addColumn('{{%product_param}}', 'have_set', $this->smallInteger());
        $this->addColumn('{{%product_param}}', 'hint', $this->string());
    }

    public function down()
    {
        echo "m161026_045233_addcol_mw_product_param_table cannot be reverted.\n";
        $this->dropColumn('{{%product_param}}', 'pos');
        $this->dropColumn('{{%product_param}}', 'have_set');
        $this->dropColumn('{{%product_param}}', 'hint');
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
