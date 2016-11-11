<?php

use yii\db\Migration;

/**
 * Handles adding iprange to table `optim`.
 */
class m161111_043730_add_iprange_column_to_optim_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->dropColumn('{{%geo_cidr_optim}}', 'ip_block_begin');
        $this->dropColumn('{{%geo_cidr_optim}}', 'ip_block_end');
        $this->addColumn('{{%geo_cidr_optim}}', 'ip_range', $this->string()->comment('Диапазон')->after('block_end'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%geo_cidr_optim}}', 'ip_range');
        $this->addColumn('{{%geo_cidr_optim}}', 'ip_block_begin', $this->string()->after('block_end'));
        $this->addColumn('{{%geo_cidr_optim}}', 'ip_block_end', $this->string()->after('ip_block_begin'));
    }
}
