<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\Cashflow */

$this->title = 'Update Cashflow: ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Биллинг', 'url' => ['index']];
$this->params['breadcrumbs'][] = ['label' => $model->id, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Редактирование';
?>
<div class="cashflow-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
