<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mw_post`.
 */
class m161024_091214_create_mw_post_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%post}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'price' => $this->integer(),
            'def' => $this->smallInteger(),
            'active' => $this->smallInteger(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%post}');
    }
}
