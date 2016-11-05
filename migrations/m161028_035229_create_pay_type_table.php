<?php

use yii\db\Migration;

/**
 * Handles the creation for table `pay_type`.
 */
class m161028_035229_create_pay_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%pay_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Название'),
            'active' => $this->smallInteger()->comment('Использовать'),
        ], 'CHARACTER SET utf8');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%pay_type}}');
    }
}
