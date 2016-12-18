<?php

use yii\db\Migration;

class m161217_163349_add_def_value_id_product_param_table extends Migration
{
    public function up()
    {
        $this->addColumn('{{%product_param}}', 'def_value', $this->string()->comment('Значение по умолчанию'));
    }

    public function down()
    {
        $this->dropColumn('{{%product_param}}', 'def_value');
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
