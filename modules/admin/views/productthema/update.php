<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Productthema */

$this->title = 'Редакитрование: ' . $model->name;
$this->params['breadcrumbs'][] = ['label' => 'Темы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->name, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="productthema-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
