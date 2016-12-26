<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\helpers\Url;

$this->registerCssFile('/css/basket.css');
$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <div class="container">
        <h1><?= Html::encode($this->title) ?></h1>
        <?php if(isset($products) and count($products) > 0){ foreach ($products as $pkey => $product){ ?>
            <div class="row prod_line">
                <div class="col-sm-3">
                    <h3><?= $info[$product['product_id']]['producttype']['name'] . ' - ' . $info[$product['product_id']]['name'] ?></h3>
                </div>
                <div class="col-sm-3">
                    <img src="/img/product/<?= $product['product_id'] ?>/id_<?= $product['product_id'] ?>_150x150.jpg" />
                </div>
                <div class="col-sm-5">
                    <table>
                        <?php foreach($product as $key => $value){ if(is_numeric($key)){?>
                            <tr><td><?= $param_list[$key]['name'] ?></td><td class="right">&nbsp;<?= $value ?></td><td>&nbsp;мм.</td></tr>
                        <?php }} ?>
                        <tr><td>Количество:</td><td>&nbsp;<?= $product['cn'] ?></td><td>&nbsp;</td></tr>
                        <tr><td>Стоимось:</td><td>&nbsp;<?= $product['price'] ?></td><td>&nbsp;руб.</td></tr>
                    </table>
                </div>
                <div class="prod_del">
                    <a href="<?= Url::to(['/basket/del', 'id' => $pkey]) ?>" ><span class="fa fa-close" title="Удалить позицию из корзины"></span></a>
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