<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_product_param`.
 */
class m161026_025733_create_mw_product_param_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product_param}}', [
            'id' => $this->primaryKey(),
            'product_type_id' => $this->integer(),
            'name' => $this->string(),
            'active' => $this->smallInteger(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('mw_product_param');
    }
}
