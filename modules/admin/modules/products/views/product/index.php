<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Producttype;
use app\models\Productthema;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Список товаров';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить товар', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            [
                'attribute' => 'product_type_id',
                'filter' => ArrayHelper::map(Producttype::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->producttype->name;
                }
            ],
            [
                'attribute' => 'product_thema_id',
                'filter' => ArrayHelper::map(Productthema::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->thema->name;
                }
            ],
            //'active:boolean',
            [
                'attribute' => 'active',
                'filter' => ['Нет', 'Да'],
                'format' => 'boolean',
            ],
            //'name_translit',
            // 'title',
            // 'keywords',
            // 'description',
            // 'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
