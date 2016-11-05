<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Productthema */

$this->title = 'Новая запись';
$this->params['breadcrumbs'][] = ['label' => 'Темы товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productthema-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
