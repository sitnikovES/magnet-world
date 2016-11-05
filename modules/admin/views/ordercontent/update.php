<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\OrderContent */

$this->title = 'Редактирование содержимого заказа: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Order Contents', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="order-content-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
