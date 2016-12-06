<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\ProductPopular */

$this->title = 'Create Product Popular';
$this->params['breadcrumbs'][] = ['label' => 'Product Populars', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-popular-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
