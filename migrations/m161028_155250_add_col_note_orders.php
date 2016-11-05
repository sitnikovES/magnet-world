<?php

use yii\db\Migration;

class m161028_155250_add_col_note_orders extends Migration
{
    public function up()
    {
        $this->addColumn('{{%orders}}', 'note', $this->text());
    }
    public function down()
    {
        echo "m161028_155250_add_col_note_orders cannot be reverted.\n";
        $this->dropColumn('{{%orders}}', 'note');
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
