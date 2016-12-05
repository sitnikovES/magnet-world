<?php

use yii\helpers\Html;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSimilar */

$product_id = Yii::$app->request->get('product_id');

if($product_id){
    $product = Product::findOne($product_id);
}

$this->title = 'Добавление похожего товара';
$this->params['breadcrumbs'][] = ['label' => 'Работа с товарами', 'url' => ['/admin/products']];
$this->params['breadcrumbs'][] = ['label' => 'Список товаров', 'url' => ['product/']];
if($product_id){
    $product = Product::findOne($product_id);
    $this->params['breadcrumbs'][] = ['label' => $product->producttype->name . ' - ' . $product->name, 'url' => ['product/view', 'id' => $product_id]];
}
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="product-similar-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>