<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\assets\ProductAsset;

$this->title = $product['producttype']['name'] . ' - ' . $product['name'];
$this->registerMetaTag(['name' => 'keywords', 'content' => $product['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $product['description']]);

$this->registerAssetBundle(ProductAsset::className());

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1 class="center"><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6 center">
                <div class="col-sm-12">
                    <img src="/img/product/<?= $product['id'] ?>/id_<?= $product['id'] ?>_500x500.jpg" />
                </div>
                <div class="col-sm-12">
                    //Слайдер
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-sm-12">
                    <?= $product['text'] ?>
                </div>
                <div class="col-sm-12">
                    //форма
                </div>
                <div class="col-sm-12">
                    <?= $product['producttype']['text'] ?>
                </div>
            </div>
        </div>
    </div>
    <pre>
        <?php /*print_r($product);*/ ?>
    </pre>
</div>
