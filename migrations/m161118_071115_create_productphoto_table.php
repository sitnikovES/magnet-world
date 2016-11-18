<?php

use yii\db\Migration;

/**
 * Handles the creation for table `productphoto`.
 */
class m161118_071115_create_productphoto_table extends Migration
{
    /**
     * @inheritdoc
     */
    public function up()
    {
        $this->createTable('{{%product_photo}}', [
            'id' => $this->primaryKey(),
            'product_id' => $this->integer()->comment('Продукт'),
            'filename' => $this->string()->comment('Имя файла'),
            'hide' => $this->smallInteger()->comment('Показывать')->defaultValue(0),
            'alt' => $this->string()->comment('Описание'),
            'title' => $this->string()->comment('Подпись к фото'),
        ], 'CHARACTER SET utf8');
        $this->createIndex('image_prod', '{{%product_photo}}', 'product_id');
    }

    /**
     * @inheritdoc
     */
    public function down()
    {
        $this->dropTable('{{%product_photo}}');
    }
}
