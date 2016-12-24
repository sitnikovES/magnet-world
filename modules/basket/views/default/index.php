<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php if(isset($products)){ foreach ($products as $product){ ?>
            <div class="row">
                <div class="col-sm-3">
                    <?= $info[$product['product_id']]['producttype']['name'] . ' - ' . $info[$product['product_id']]['name'] ?>
                </div>
                <div class="col-sm-3">
                    <img src="/img/product/<?= $product['product_id'] ?>/id_<?= $product['product_id'] ?>_150x150.jpg" />
                </div>
                <div class="col-sm-6">
                    <table>
                        <?php foreach($product as $key => $value){ if(is_numeric($key)){?>
                            <tr><td><?= $param_list[$key]['name'] ?></td><td>&nbsp;<?= $value ?> мм.</td></tr>
                        <?php }} ?>
                        <tr><td>Количество:</td><td>&nbsp;<?= $product['cn'] ?></td></tr>
                        <tr><td>Стоимось:</td><td>&nbsp;<?= $product['price'] ?> руб.</td></tr>
                    </table>
                </div>
            </div>
        <?php }?>
            <br>
            <div class="row" style="text-align: right;">
                <a href="<?= Url::to(['/basket/order']) ?>"><button class="btn btn-success">Оформить заказ</button></a>
            </div>
        <?php } else { ?>
            У вас не добавлено ни одного товара.

        <?php } ?>
        <br>
        <br>
        <br>
    </div>
</div>