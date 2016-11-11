<?php

use yii\db\Migration;

/**
 * Handles adding latitude to table `geo_cities`.
 */
class m161111_041923_add_latitude_column_to_geo_cities_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%geo_cities}}', 'latitude', $this->float()->comment('Широта'));
        $this->addColumn('{{%geo_cities}}', 'longitude', $this->float()->comment('Долгота'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%geo_cities}}', 'latitude');
        $this->dropColumn('{{%geo_cities}}', 'longitude');
    }
}
