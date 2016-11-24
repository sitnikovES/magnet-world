<?php

use yii\helpers\Html;

/* @var $this yii\web\View */
/* @var $model app\models\ProductPhoto */

$product = \app\models\Product::findOne($model->product_id);

$this->title = 'Правка описания фото: ' . $model->filename;
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['/admin/products/product']];
$this->params['breadcrumbs'][] = ['label' => $product->producttype->name . ' - ' . $product->name, 'url' => ['/admin/products/product/view', 'id' => $model->product_id]];
$this->params['breadcrumbs'][] = ['label' => 'Фотогалерея', 'url' => ['index', 'product_id' => $model->product_id]];
$this->params['breadcrumbs'][] = ['label' => $model->filename, 'url' => ['view', 'id' => $model->id]];
$this->params['breadcrumbs'][] = 'Правка описания';
?>
<div class="product-photo-update">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
