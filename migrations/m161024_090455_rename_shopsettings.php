<?php

use yii\db\Migration;

class m161024_090455_rename_shopsettings extends Migration
{
    public function up()
    {
        $this->renameTable('shop_settings', '{{%shop_settings}}');
    }

    public function down()
    {
        echo "m161024_090455_rename_shopsettings cannot be reverted.\n";
        $this->renameTable('mw_shop_settings', 'shop_settings');
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
