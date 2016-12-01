<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Размеры подгружаемых фото';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagesize-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'cat',
            [
                'attribute' => 'some_id',
                'header' => 'Тип товара',
                'content' => function($data){
                    return $data->some_id;
                },
            ],
            'some_id',
            'width',
            'height',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
