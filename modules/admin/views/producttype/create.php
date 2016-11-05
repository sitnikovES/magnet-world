<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Producttype */

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Типы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="producttype-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
