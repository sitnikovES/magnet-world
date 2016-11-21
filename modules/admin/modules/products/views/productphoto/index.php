<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\modules\admin\modules\products\models\ProductphotoSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */
$product = \app\models\Product::findOne(Yii::$app->request->get('product_id'));

$this->title = 'Фотогалерея';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['/admin/products/product']];
$this->params['breadcrumbs'][] = ['label' => $product->producttype->name . ' - ' . $product->name, 'url' => ['/admin/products/product/view', 'id' => $product->id]];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-photo-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'product_id',
            'filename',
            [
                'header' => 'Изображение',
                'format' => 'raw',
                'content' => function($data){
                    return Html::img(
                        '/img/product/' . $data->product_id . '/demo/' . $data->filename,
                        [
                            'alt' => $data->alt,
                            'style' => 'max-height: 75px; max-width: 150px;'
                        ]
                    );
                    return $data->filename . '<img src="/img/product/' . $data->product_id . '/demo/' . $data->filename . '" height="75px" />';
                },
            ],
            'hide:boolean',
            'alt',
            'title',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
