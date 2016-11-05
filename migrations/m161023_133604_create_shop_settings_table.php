<?php

use yii\db\Migration;

/**
 * Handles the creation for table `shop_settings`.
 */
class m161023_133604_create_shop_settings_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%shop_settings}}', [
            'id' => $this->primaryKey(),
            'name' => $this->string(),
            'value' => $this->string()
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%shop_settings}}');
    }
}
