<?php

use yii\db\Migration;

/**
 * Handles the creation for table `cities`.
 */
class m161108_161322_create_cities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('cities', [
            'id' => $this->primaryKey(),
            'name' => $this->string()->comment('Название наспеленного пункта'),
            'region' => $this->string()->comment('Регион'),
            'federal_region' => $this->string()->comment('Федеральный округ'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('cities');
    }
}
