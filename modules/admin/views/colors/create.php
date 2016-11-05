<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Colors */

$this->title = 'Новый цвет';
$this->params['breadcrumbs'][] = ['label' => 'Цвета наклеек', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="colors-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
