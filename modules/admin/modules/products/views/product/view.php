<?php

use yii\helpers\Html;
use yii\widgets\DetailView;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $model app\models\Product */

$this->title = $model->producttype->name . ' - ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-md-6">
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
                'text:html',
            ],
        ]) ?>
    </div>
</div>
<div class="col-md-6">
    <h2>Похожие товары</h2>
    <p>
        <?= Html::a('Добавить', ['productsimilar/create', 'product_id' => $model->id], ['class' => 'btn btn-primary']) ?>
        <?= GridView::widget([
            'dataProvider' => $similarProducts,
            'columns' => [
                //['class' => 'yii\grid\SerialColumn'],

                //'id',
                //'product_id',
                [
                    'attribute' => 'similar_product_id',
                    'format' => 'raw',
                    'content' => function($data){
                        return Html::a($data->similar->name, ['product/view', 'id' => $data->similar_product_id]);
                    }
                ],
                [
                    'attribute' => 'similar_product_id',
                    'header' => 'Изображение',
                    'format' => 'raw',
                    'content' => function($data){
                        return '<img height="100px" src="' . '/img/product/' . $data->similar_product_id . '/' . $data->similar->image . '" /> ';
                        return $data->similar->name;
                    }
                ],
                [
                    'class' => 'yii\grid\ActionColumn',
                    'template' => '{delete}',
                    'buttons' => [
                        'delete' => function ($url,$data) {
                            return Html::a(
                                '<span class="glyphicon glyphicon-trash"></span>',
                                ['productsimilar/delete', 'id' => $data->id], ['data-method'=>'post']);
                        },
                    ],

                ],
            ],
        ]); ?>
    </p>
</div>

