<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Postcompany */

$this->title = 'Новый способ доставки';
$this->params['breadcrumbs'][] = ['label' => 'Способы доставки', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="postcompany-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
