<?php

use yii\db\Migration;

class m161229_141407_addcol_to_paytype extends Migration
{
    public function up()
    {
        //$this->addColumn('{{%post}}', 'def', $this->integer()->comment('Использовать по умолчанию'));
        $this->addColumn('{{%pay_type}}', 'def', $this->integer()->comment('Использовать по умолчанию'));
    }

    public function down()
    {
        //$this->dropColumn('{{%post}}', 'def');
        $this->dropColumn('{{%pay_type}}', 'def');
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
