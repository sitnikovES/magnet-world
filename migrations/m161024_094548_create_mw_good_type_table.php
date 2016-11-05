<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_good_type`.
 */
class m161024_094548_create_mw_good_type_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product_type}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'mname' => $this->string(),
            'active' => $this->smallInteger(),
            'pos' => $this->integer(),
            'rakel' => $this->smallInteger(),
            'title' => $this->string(),
            'caption' => $this->string(),
            'keytwords' => $this->string(),
            'description' => $this->string(),
            'text' => $this->text(),
            'name_translit' => $this->string(),
            'price_formula' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_type}}');
    }
}
