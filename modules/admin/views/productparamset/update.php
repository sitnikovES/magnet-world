<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductParamSet */

$this->title = 'Update Product Param Set: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Наборы значений параметров товара', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Update';
?>
<div class="product-param-set-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
