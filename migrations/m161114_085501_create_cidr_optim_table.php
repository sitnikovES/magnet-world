<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cidr_optim`.
 */
class m161114_085501_create_cidr_optim_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%geo_cidr_optim}}', [
            'id' => $this->primaryKey(),
            'block_begin' => $this->integer()->comment('Начало блока'),
            'block_end' => $this->integer()->comment('Конец блока'),
            'ip_block_begin' => $this->string()->comment('Начало блока'),
            'ip_block_end' => $this->string()->comment('Конец блока'),
            'country' => $this->string()->comment('Код страны'),
            'city_id' =>$this->integer()->comment('Код города')
        ], 'CHARACTER SET utf8');
        $this->createIndex('ip_begin', '{{%geo_cidr_optim}}', 'block_begin');
        $this->createIndex('ip_end', '{{%geo_cidr_optim}}', 'block_end');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%geo_cidr_optim}}');
    }
}
