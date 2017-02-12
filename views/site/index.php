<?php

/* @var $this yii\web\View */


use yii\helpers\Url;

$this->title = 'Магнитный мир';

//phpinfo();
?>
<div class="site-index">
    <div class="body-content">
        <div class="jumbotron">
            <h1>Наши новинки!</h1>
        </div>
        <div class="row">
            <?php
            foreach($new_product as $product){ ?>
            <div class="col-lg-4 col-md-6" style="text-align: center;">
                <a href="<?= Url::to(['/product', 'id' => $product['id']]) ?>">
                    <img src="/img/product/<?= $product['id'] ?>/id_<?= $product['id'] ?>_350x350.jpg" style="height:350px; width:350px;" />
                </a>
                <div style="margin-top: -34px;">
                    <a href="<?= Url::to(['product', 'id' => $product['id']]) ?>"><button style="color: #FFF; border:0; height: 34px; width: 350px; background-color: rgba(0,0,0,0.5);"><?= $product['producttype']['name'] . ' - ' . $product['name'] ?></button></a>
                </div><p></p>
            </div>
            <?php } ?>
        </div>
        <div class="jumbotron">
            <h1>Популярные товары</h1>
        </div>
        <div class="row">
            <?php
            foreach($pop_product as $product){ ?>
                <div class="col-lg-4 col-md-6" style="text-align: center;">
                    <a href="<?= Url::to(['/product', 'id' => $product['id']]) ?>">
                        <img src="/img/product/<?= $product['id'] ?>/id_<?= $product['id'] ?>_350x350.jpg" style="height:350px; width:350px;" />
                    </a>
                    <div style="margin-top: -34px;">
                        <a href="<?= Url::to(['/product', 'id' => $product['id']]) ?>"><button style="color: #FFF; border:0; height: 34px; width: 350px; background-color: rgba(0,0,0,0.5);"><?= $product['producttype']['name'] . ' - ' . $product['name'] ?></button></a>
                    </div><p></p>
                </div>
            <?php } ?>
        </div>
    </div>
</div>
