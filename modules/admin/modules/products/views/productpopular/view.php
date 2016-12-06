<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\ProductPopular */

$this->title = 'Запись № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Популярные', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-popular-view">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Редактировать', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
            'class' => 'btn btn-danger',
            'data' => [
                'confirm' => 'Are you sure you want to delete this item?',
                'method' => 'post',
            ],
        ]) ?>
    </p>

    <?= DetailView::widget([
        'model' => $model,
        'attributes' => [
            //'id',
            //'product_id',
            [
                'attribute' => 'product_id',
                'format' => 'raw',
                'value' => '<div class="col-sm-4">' . Html::a($model->product->producttype->name . ' - ' . $model->product->name, ['product/view', 'id' => $model->product->id]) . '</div>' .
                    '<div class="col-sm-4">' . Html::img('/img/product/' . $model->product->id . '/' . $model->product->image, ['height' => '100px']) . '</div>',
            ],
        ],
    ]) ?>

</div>
