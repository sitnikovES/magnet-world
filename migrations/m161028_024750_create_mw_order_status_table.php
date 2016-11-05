<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_order_status`.
 */
class m161028_024750_create_mw_order_status_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%order_status}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->unique()->notNull(),
            'active' => $this->smallInteger()->defaultValue(0)->notNull()->comment('Отображать'),
        ], 'CHARACTER SET utf8');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%order_status}}');
    }
}
