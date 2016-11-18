<?php

use yii\helpers\Html;


/* @var $this yii\web\View */
/* @var $model app\models\Productparam */

$this->title = 'Новый параметр';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Параметры товаров', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="productparam-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
