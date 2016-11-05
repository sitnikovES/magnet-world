<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderContent */

$this->title = 'Новая позиция в заказе';
$this->params['breadcrumbs'][] = ['label' => 'Содержимое заказа', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-content-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
