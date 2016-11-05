<?php

use yii\db\Migration;

/**
 * Handles the creation for table `mwusers`.
 */
class m161024_073213_create_mwusers_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%users}', [
            'id' => $this->primaryKey(),
            'login' => $this->string(),
            'name' => $this->string(),
            'email' => $this->string(),
            'role' => $this->smallInteger(),
            'status' => $this->smallInteger(),
            'password_hash' => $this->string(),
            'created_at' => $this->integer(),
            'updated_at' => $this->integer(),
            'auth_key' => $this->string(),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%users}}');
    }
}
