<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->producttype->name . ' - ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Фотогалерея', ['productphoto/', 'product_id' => $model->id], ['class' => 'btn btn-primary']) ?>

    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            [
                'attribute' => 'file',
                'format' => 'raw',
                'value' => '<img src="' . '/img/product/' . $model->id . '/' . $model->image . '" /> ' . $model->image,
            ],
            //'id',
            'name',
            //'product_type_id',
            ['attribute' => 'Тип товара', 'value' => $model->producttype->name, ],
            'active:boolean',
            'name_translit',
            'title',
            'keywords',
            'description',
            'text:ntext',
        ],
    ]) ?>

</div>
