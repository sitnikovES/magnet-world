<?php

use yii\db\Migration;

class m161127_141338_add_collumn_product_thema_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%product_thema}}', 'file_icon', $this->string()->comment('Файл изображения темы'));
    }

    public function down()
    {
        //echo "m161127_141338_add_collumn_product_thema_table cannot be reverted.\n";
        $this->dropColumn('{{%product_thema}}', 'file_icon');
        //return false;
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
