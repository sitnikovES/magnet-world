<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cidr_optim`.
 */
class m161108_163059_create_cidr_optim_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cidr_optim', [
            'id' => $this->primaryKey(),
            'block_begin' => $this->integer()->comment('Начало блока'),
            'block_end' => $this->integer()->comment('Конец блока'),
            'ip_block_begin' => $this->string()->comment('Начало блока'),
            'ip_block_end' => $this->string()->comment('Конец блока'),
            'country' => $this->string()->comment('Код страны'),
            'city_id' =>$this->integer()->comment('Код города')
        ]);
        $this->createIndex('ip_begin', 'cidr_optim', 'block_begin');
        $this->createIndex('ip_end', 'cidr_optim', 'block_end');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cidr_optim');
        $this->dropIndex('ip_begin', 'cidr_optim');
        $this->dropIndex('ip_end', 'cidr_optim');
    }
}
