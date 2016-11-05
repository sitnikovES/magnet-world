<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Shopsettings */

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Настройки магазина', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="shopsettings-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
