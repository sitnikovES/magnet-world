<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_product_param_set`.
 */
class m161027_081206_create_mw_product_param_set_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product_param_set}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'active' => $this->smallInteger(),
            'product_param_id' => $this->integer(),
            'hint' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_param_set}}');
    }
}
