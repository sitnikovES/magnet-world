<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Содежимое заказа';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-content-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Create Order Content', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'order_id',
            //'product_id',
            [
                'attribute' => 'product_id',
                'content' => function($data){
                    return $data->product->producttype->name . ' - ' . $data->product->name;
                }
            ],
            'cnt',
            'price',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
