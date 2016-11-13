<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cashflow`.
 */
class m161112_142140_create_cashflow_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%cashflow}}', [
            'id' => $this->primaryKey(),
            'type' => $this->smallInteger()->defaultValue(0)->comment('0-Затраты, 1-Приход'),
            'description' => $this->string()->comment('Краткое описание действия'),
            'order_id' => $this->integer()->notNull()->comment('Номер заказа'),
            'value' => $this->float()->defaultValue(0)->comment('Сумма(руб.)')
        ]);
        $this->createIndex('cashflow_order_id', '{{%cashflow}}', 'order_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%cashflow}}');
    }
}
