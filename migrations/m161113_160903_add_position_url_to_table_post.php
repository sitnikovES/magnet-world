<?php

use yii\db\Migration;

class m161113_160903_add_position_url_to_table_post extends Migration
{
    public function up()
    {
        $this->addColumn('{{%post}}', 'url', $this->string()->comment('Сайт компании'));
    }

    public function down()
    {
        //echo "m161113_160903_add_position_url_to_table_post cannot be reverted.\n";
        $this->dropColumn('{{%post}}', 'url');
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
