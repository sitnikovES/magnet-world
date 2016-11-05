<?php

use yii\helpers\Html;
use yii\grid\GridView;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Типы товаров';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producttype-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тип', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'mname',
            'active:boolean',
            //'pos',
            // 'rakel',
            // 'title',
            // 'caption',
            // 'keywords',
            // 'description',
            // 'text:ntext',
            // 'name_translit',
            // 'price_formula',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
