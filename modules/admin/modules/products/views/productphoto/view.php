<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\ProductPhoto */

$product = \app\models\Product::findOne($model->product_id);

$this->title = $model->title;
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['/admin/products/product']];
$this->params['breadcrumbs'][] = ['label' => $product->producttype->name . ' - ' . $product->name, 'url' => ['/admin/products/product/view', 'id' => $model->product_id]];
$this->params['breadcrumbs'][] = ['label' => 'Фотогалерея', 'url' => ['index', 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = $model->filename;
?>
<div class="product-photo-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Вы уверены, что хотите удалить эту фотографию?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'product_id',
            'filename',
            [
                'attribute' => 'filename',
                'label' => 'Изображение',
                'format' => 'raw',
                'value' => Html::img('/img/product/' . $model->product_id . '/demo/' . $model->filename,
                [
                    'alt' => $model->alt,
                    'style' => 'max-height: 75px; max-width: 150px;'
                ]),
            ],
            'hide:boolean',
            'alt',
            'title',
        ],
    ]) ?>

</div>
