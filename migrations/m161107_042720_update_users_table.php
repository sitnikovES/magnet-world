<?php

use yii\db\Migration;

class m161107_042720_update_users_table extends Migration
{
    public function up()
    {
        $this->renameColumn('{{%users}}', 'role', 'role_id');
    }

    public function down()
    {
        echo "m161107_042720_update_users_table cannot be reverted.\n";
        $this->renameColumn('{{%users}}', 'role_id', 'role');
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
