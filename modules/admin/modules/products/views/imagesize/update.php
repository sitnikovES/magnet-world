<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Imagesize */

$this->title = 'Редактирование: Запись № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Размеры подгружаемых фото', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => 'Запись № ' . $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="imagesize-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
