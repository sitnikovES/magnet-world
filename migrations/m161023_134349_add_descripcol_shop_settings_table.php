<?php

use yii\db\Migration;

class m161023_134349_add_descripcol_shop_settings_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%shop_settings}}', 'description', $this->string());
    }

    public function down()
    {
        echo "m161023_134349_add_descripcol_shop_settings_table cannot be reverted.\n";
        $this->dropColumn('{{%shop_settings}}', 'description');
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
