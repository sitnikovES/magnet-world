<?php

use yii\db\Migration;

/**
 * Handles the creation for table `product_imagesize`.
 */
class m161130_162705_create_product_imagesize_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product_imagesize}}', [
            'id' => $this->primaryKey(),
            'cat' => $this->integer()->comment('куда(товар, тема и пр.)'),
            'some_id' => $this->integer()->comment('id по категории'),
            'width' => $this->integer()->comment('Ширина изображения'),
            'height' => $this->integer()->comment('Высота изображения'),
        ]);
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_imagesize}}');
    }
}