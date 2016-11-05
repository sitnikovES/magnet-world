<?php

use yii\db\Migration;

class m161025_073902_rename_mw_product_type_keywords extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%product_type}}', 'keytwords', 'keywords');
    }

    public function down()
    {
        echo "m161025_073902_rename_mw_product_type_keywords cannot be reverted.\n";
        $this->renameColumn('{{%product_type}}', 'keywords', 'keytwords');
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
