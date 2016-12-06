<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_popular`.
 */
class m161206_040031_create_product_popular_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('product_popular', [
            'id' => $this->primaryKey(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('product_popular');
    }
}
