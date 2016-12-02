<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_similar`.
 */
class m161202_014111_create_product_similar_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product_similar}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->comment('Товар'),
            'similar_product_id' => $this->integer()->comment('Похожий товар'),
        ], 'CHARACTER SET utf8');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_similar}}');
    }
}
