<?php

use yii\db\Migration;

/**
 * Handles adding post_price to table `orders`.
 */
class m170124_024344_add_post_price_column_to_orders_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->addColumn('{{%orders}}' ,'post_price', $this->integer()->comment('Стоимость доставки на момент заказа'));
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropColumn('{{%orders}}', 'post_price');
    }
}
