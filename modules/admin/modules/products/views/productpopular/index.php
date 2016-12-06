<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Популярные';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-popular-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'product_id',
            [
                'attribute' => 'product_id',
                'format' => 'raw',
                'content' => function($data){
                    return '<div class="col-sm-4">' . Html::a($data->product->producttype->name . ' - ' . $data->product->name, ['product/view', 'id' => $data->product->id]) . '</div>' .
                    '<div class="col-sm-4">' . Html::img('/img/product/' . $data->product->id . '/' . $data->product->image, ['height' => '100px']) . '</div>';
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
