<?php

use yii\db\Migration;

class m161023_152005_add_typeidcol_shop_settings_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%shop_settings}}', 'type_id', $this->integer());

    }

    public function down()
    {
        echo "m161023_152005_add_typeidcol_shop_settings_table cannot be reverted.\n";
        $this->dropColumn('{{%shop_settings}}', 'type_id');
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
