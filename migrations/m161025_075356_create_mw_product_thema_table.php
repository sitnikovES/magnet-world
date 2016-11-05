<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_product_thema`.
 */
class m161025_075356_create_mw_product_thema_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product_thema}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'name_translit' => $this->string(),
            'product_type_id' => $this->string(),
            'active' => $this->smallInteger(),
            'pos' => $this->smallInteger(),
            'title' => $this->string(),
            'keywords' => $this->string(),
            'description' => $this->string(),
            'text' => $this->text(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_thema}}');
    }
}
