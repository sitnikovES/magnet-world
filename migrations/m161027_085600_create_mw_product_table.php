<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_product`.
 */
class m161027_085600_create_mw_product_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'product_type_id' => $this->integer(),
            'active' => $this->smallInteger(),
            'name_translit' => $this->string(),
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
        $this->dropTable('{{%product}}');
    }
}
