<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

?>
<div class="order-product-param-index">
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            //['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'order_content_id',
            //'product_param_id',
            [
                'attribute' => 'product_param_id',
                'content' => function($data){
                    return $data->param->name;
                }
            ],
            'value',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
