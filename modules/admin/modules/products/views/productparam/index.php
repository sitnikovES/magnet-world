<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Producttype;
use app\models\Productparam;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductparamSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Параметры товаров';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productparam-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить параметр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            //'product_type_id',
            [
                'attribute' => 'product_type_id',
                'filter' => ArrayHelper::map(Producttype::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->producttype->name;
                }
            ],
            'name',
            //'active',
            [
                'attribute' => 'active',
                'filter' => ['Нет', 'Да'],
                'format' => 'boolean',
            ],
            'pos',

            //'have_set:boolean',
            [
                'attribute' => 'have_set',
                'filter' => Productparam::$valueType,
                'content' => function($data){
                    return Productparam::$valueType[$data['have_set']];
                }

            ],
            'hint',
            'def_value',
            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
