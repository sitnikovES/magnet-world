<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderContent */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Содержимое заказа', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-content-view">

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
            'order_id',
            //'product_id',
            ['attribute' => 'product_id', 'value' => $model->product->producttype->name . ' - ' . $model->product->name],
            'cnt',
            'price',
        ],
    ]) ?>

</div>
