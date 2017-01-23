<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\DetailView;


$this->title = 'Информация о заказе';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>
    <div class="col-md-5">
        <?= DetailView::widget([
            'model' => $order,
            'attributes' => [
                //'id',
                //'created_at:datetime',
                ['attribute' => 'created_at', 'format' => ['datetime', 'dd.MM.Y HH:mm:ss']],
                //'updated_at:datetime',
                'name',
                'phone',
                'address',
                'email:email',
                'postindex',
                //'order_status_id',
                ['attribute' => 'Статус заказа', 'value' => $order->status->name, ],
                //'pay_type_id',
                ['attribute' => 'Способ оплаты', 'value' => $order->paytype->name, ],
                //'post_type_id',
                ['attribute' => 'Способ отправки', 'value' => $order->postcompany->name, ],
                'post_code',
                'note',
            ],
        ]) ?>
    </div>
    <div class="col-md-7">

    </div>
</div>
