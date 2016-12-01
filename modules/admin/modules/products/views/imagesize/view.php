<?php

use yii\helpers\Html;
use yii\widgets\DetailView;

/* @var $this yii\web\View */
/* @var $model app\models\Imagesize */

$this->title = 'Запись № ' . $model->id;
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Размеры подгружаемых фото', 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="col-sm-6 col-md-4">
    <div class="imagesize-view">

        <h1><?= Html::encode($this->title) ?></h1>

        <p>
            <?= Html::a('Изменить', ['update', 'id' => $model->id], ['class' => 'btn btn-primary']) ?>
            <?= Html::a('Удалить', ['delete', 'id' => $model->id], [
                'class' => 'btn btn-danger',
                'data' => [
                    'confirm' => 'Are you sure you want to delete this item?',
                    'method' => 'post',
                ],
            ]) ?>
        </p>

        <?= DetailView::widget([
            'model' => $model,
            'attributes' => [
                //'id',
                //'cat',
                'some_id',
                'width',
                'height',
            ],
        ]) ?>

    </div>
</div>