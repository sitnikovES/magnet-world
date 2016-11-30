<?php

use yii\db\Migration;

class m161130_093658_add_image_in_product_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%product}}', 'image', $this->string()->comment('Основное изображение товара'));
    }

    public function down()
    {
        //echo "m161130_093658_add_image_in_product_table cannot be reverted.\n";
        $this->dropColumn('{{%product}}', 'image');
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
