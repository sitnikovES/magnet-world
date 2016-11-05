<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\OrderProductParam */

$this->title = $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Product Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-product-param-view">

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
            'id',
            'order_content_id',
            'product_param_id',
            'value',
        ],
    ]) ?>

</div>
