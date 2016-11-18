<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Producttype;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Темы товаров';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productthema-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить тему', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            //'name_translit',
            //'product_type_id',
            [
                'attribute' => 'product_type_id',
                'filter' => ArrayHelper::map(Producttype::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->producttype->name;
                }
            ],
            //'active:boolean',
            [
                'attribute' => 'active',
                'filter' => ['Нет', 'Да'],
                'content' => function($data){
                    if($data->active){
                        return 'Да';
                    }
                    return 'Нет';
                }
            ],
            // 'pos',
            // 'title',
            // 'keywords',
            // 'description',
            // 'text:ntext',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
