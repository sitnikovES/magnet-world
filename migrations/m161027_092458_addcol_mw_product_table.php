<?php

use yii\db\Migration;

class m161027_092458_addcol_mw_product_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%product}}', 'product_thema_id', $this->integer());
    }

    public function down()
    {
        echo "m161027_092458_addcol_mw_product_table cannot be reverted.\n";
        $this->dropColumn('{{%product}}', 'product_thema_id');
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
