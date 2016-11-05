<?php

use yii\db\Migration;

/**
 * Handles the creation for table `order_content`.
 */
class m161028_165006_create_order_content_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%order_content}}', [
            'id' => $this->primaryKey(),
            'order_id' => $this->integer()->comment('Код заказа'),
            'product_id' => $this->integer()->comment('Код товара'),
            'cnt' => $this->smallInteger()->defaultValue(1)->comment('Количество')
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%order_content}}');
    }
}
