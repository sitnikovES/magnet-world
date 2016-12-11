<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 07.12.2016
 * Time: 15:52
 */

/* @var $this yii\web\View */

$this->title = 'Каталог магнитных панелей';
?>
<div class="site-index">
    <h1>Магнитные панели на холодильник!</h1>
    <div class="body-content">
        <div class="row">
        <?php foreach($products as $product){ ?>
            <div class="col-lg-4 col-md-6" style="text-align: center;">
                        <a href="/?id=<?= $product['id'] ?>">
                            <img src="/img/product/<?= $product['id'] . '/id_' . $product['id'] ?>_350x350.jpg" style="height:350px; width:350px;" />
                        </a>
                        <div style="margin-top: -34px;">
                            <a href="/?id=<?= $product['id'] ?>"><button style="color: #FFF; border:0; height: 34px; width: 350px; background-color: rgba(0,0,0,0.5);"><?= strtoupper($type['name'] . ' - ' . $product['name']) ?></button></a>
                        </div><p></p>
            </div>
        <?php } ?>
        </div>
    </div>
</div>