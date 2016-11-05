<?php

use yii\helpers\Html;
use yii\grid\GridView;
use app\models\Producttype;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Настройки магазина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopsettings-index">

    <h1><?= Html::encode($this->title) ?></h1>

    <p>
        <?= Html::a('Добавить параметр', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            'name',
            'value',
            //'type_id',
            [
                'attribute' => 'type_id',
                'filter' => ArrayHelper::map(Producttype::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->type->name;

                }
            ],
            'description',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
