<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Imagesize */

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Размеры подгружаемых фото', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="imagesize-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
