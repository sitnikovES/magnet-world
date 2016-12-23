<?php

use yii\helpers\Html;
use yii\grid\GridView;
use yii\helpers\ArrayHelper;
use app\models\OrderStatus;
use app\models\Paytype;
use app\models\Postcompany;

/* @var $this yii\web\View */
/* @var $searchModel app\models\OrdersSearch */
/* @var $dataProvider yii\data\ActiveDataProvider */

$this->title = 'Заказы';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="orders-index">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php // echo $this->render('_search', ['model' => $searchModel]); ?>

    <p>
        <?= Html::a('Создать заказ', ['create'], ['class' => 'btn btn-success']) ?>
    </p>
    <?= GridView::widget([
        'dataProvider' => $dataProvider,
        'filterModel' => $searchModel,
        'columns' => [
            ['class' => 'yii\grid\SerialColumn'],

            //'id',
            [
                'attribute' => 'created_at',
                'format' => ['date', 'Y.MM.dd HH:mm:ss'],
            ],
            //'updated_at',
            'name',
            'phone',
            'address',
            // 'email:email',
            // 'postindex',
            //'order_status_id',
            [
                'attribute' => 'order_status_id',
                'filter' => ArrayHelper::map(OrderStatus::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->status->name;
                }
            ],

            [
                'attribute' => 'pay_type_id',
                'filter' => ArrayHelper::map(Paytype::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->paytype->name;
                }
            ],
            [
                'attribute' => 'post_type_id',
                'filter' => ArrayHelper::map(Postcompany::find()->all(), 'id', 'name'),
                'content' => function($data){
                    return $data->postcompany->name;
                }
            ],
            // 'post_code',

            ['class' => 'yii\grid\ActionColumn'],
        ],
    ]); ?>
</div>
