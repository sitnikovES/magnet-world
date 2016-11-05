<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\OrderProductParam */

$this->title = '';
$this->params['breadcrumbs'][] = ['label' => 'Order Product Params', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="order-product-param-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
