<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Product;
use yii\data\ActiveDataProvider;
use app\models\OrderProductParam;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */


?>
<div class="order-content-index">
    <h1>Состав заказа</h1>
    <p>
        <?= Html::a('Create Order Content', ['ordercontent/create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'order_id',
            //'product_id',
            [
                'attribute' => 'product_id',
                'content' => function($data){
                    return $data->product->producttype->name . ' - <br>' . $data->product->name;
                }
            ],
            [
                'attribute' => 'cnt',
                'header' => 'Кол-во',
            ],
            [
                'attribute' => 'Параметры',
                'content' => function($data){
                    $dp = new ActiveDataProvider([
                        'query' => OrderProductParam::find()->where(['order_content_id' => $data->id]),
                    ]);
                    return $this->render('index_product_param', [
                        'dataProvider' => $dp,
                    ]);
                }
            ],
            [
                'attribute' => 'price',
                'header' => 'Стоимость',
                'content' => function($data){
                    return $data->price * $data->cnt;
                }
            ],

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
