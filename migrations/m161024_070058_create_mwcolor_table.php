<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mwcolor`.
 */
class m161024_070058_create_mwcolor_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%colors}}', [
            'id' => $this->primaryKey(),
            'code' => $this->string(),
            'name' => $this->string(),
            'ORACAL' => $this->string(),
            'lst' => $this->integer(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%color}}');
    }
}
