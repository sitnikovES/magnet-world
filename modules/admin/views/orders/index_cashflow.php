<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\Orders;

/* @var $this yii\web\View */
/* @var $searchModel app\models\CashflowSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Биллинг';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="cashflow-index">

    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Добавить запись', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        //'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],
            [
                'attribute' => 'type',
                'filter' => array('Расход', 'Приход'),
                'content' => function($data){
                    if($data->type == 1){
                        return '<span class="green bold">' . $data->typename . '</span>';
                    }
                    return '<span class="red bold">' . $data->typename . '</span>';
                }
            ],
            'description',
            'value',

            //['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
