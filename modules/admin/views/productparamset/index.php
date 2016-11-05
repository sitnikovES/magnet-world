<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $searchModel app\models\ProductParamSetSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Наборы значений параметров товара';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-param-set-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Новая запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'active:boolean',
            'product_param_id',
            'hint',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
