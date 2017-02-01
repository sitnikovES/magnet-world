<?php
use app\models\OrderProductParam;

/**
 * Created by PhpStorm.
 * User: ugin
 * Date: 28.12.2016
 * Time: 21:25
 */
if(count($products)){



    $tmp = [];
    foreach ($products as $product){
        array_push($tmp, $product['product_id']);
    }
    $tmp = \app\models\Product::find()->where(['id' => $tmp])->with('producttype')->asArray()->all();
    foreach ($tmp as $product){
        $product_list[$product['id']] = $product;
    }

    //получаем названия параметров
    $param_list = [];
    $tmp = \app\models\Productparam::find()->asArray()->all();
    foreach ($tmp as $t){
        $param_list[$t['id']] = $t;
    }
    unset($tmp);

    $price = $model->post_price;
}

?>
<?php if(count($products)){ ?>
    <div class="container">
        <div class="row">
            <h1>
                Данные по заказу
            </h1>
            <div class="col-sm-5">
                <table>
                    <tr>
                        <td>Ф.И.О:&nbsp;</td>
                        <td class="bold"><?= $model->name ?>
                    </tr>
                    <tr>
                        <td>Телефон:&nbsp;</td>
                        <td class="bold"><?= $model->phone ?>
                    </tr>
                    <tr>
                        <td>EMail:&nbsp;</td>
                        <td class="bold"><?= $model->email ?></td>
                    </tr>
                    <tr>
                        <td>Почтовый индекс:&nbsp;</td>
                        <td class="bold"><?= $model->postindex ?></td>
                    </tr>
                    <tr>
                        <td>Почтовый адрес:&nbsp;</td>
                        <td class="bold"><?= $model->address ?></td>
                    </tr>
                    <tr>
                        <td>Примечание:&nbsp;</td>
                        <td class="bold"><?= $model->note ?></td>
                    </tr>
                    <tr>
                        <td>Способ отправки:&nbsp;</td>
                        <td class="bold"><?= $model->postcompany->name ?></td>
                    </tr>
                    <tr>
                        <td>Способ оплаты:&nbsp;</td>
                        <td class="bold"><?= \app\models\Paytype::find()->where(['id' => $model->pay_type_id])->one()->name ?></td>
                    </tr>
                </table>
            </div>
            <div class="col-sm-7">
                <table cellspacing="0" style="border-top: #c0c0c0 1px solid;" width="100%">
                    <?php foreach ($products as $product){ ?>
                        <tr>
                            <td style="border-bottom: #c0c0c0 1px solid;">
                                <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . \yii\helpers\Url::to(['/site/product', 'id' => $product['product_id']]) ?>">
                                    <?= $product_list[$product['product_id']]['producttype']['name'] . ' - ' . $product_list[$product['product_id']]['name'] ?>
                                </a>
                            </td>
                            <td style="border-bottom: #c0c0c0 1px solid;"><img src="<?= 'http://' . $_SERVER['SERVER_NAME'] ?>/img/product/<?= $product['product_id'] ?>/<?= 'id_' . $product['product_id'] . '_150x150.jpg' ?>"></td>
                            <td style="border-bottom: #c0c0c0 1px solid;">
                                <?php foreach (OrderProductParam::find()->where(['order_content_id' => $product['id']])->with('param')->all() as $param){ ?>
                                    <div>
                                        <?= $param->param->name . ': ' . $param->value ?>
                                    </div>
                                <?php } ?>
                                <hr>
                                <div>Стоимость: <?= $product['price'] ?> руб.</div>
                                <div>Количество: <?= $product['cnt'] ?> шт.</div>
                                <?php $price += $product['price']; foreach ($product as $key => $value){ if(is_numeric($key)){ ?>
                                    <?= $value ? '<div>' . $param_list[$key]['name'] . ' - ' . $value . '</div>' : '' ?>
                                <?php }} ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <?php if($model->post_price){ ?>
                        <tr>
                            <td colspan="2" style="border-bottom: #c0c0c0 1px solid;">
                                Стоимость отправки:
                            </td>
                            <td style="border-bottom: #c0c0c0 1px solid;">
                                <?= $model->post_price . ' руб.' ?>
                            </td>
                        </tr>
                    <?php } ?>
                    <tr>
                        <td colspan="2" style="border-bottom: #c0c0c0 1px solid;">
                            Итого к оплате:
                        </td>
                        <td style="border-bottom: #c0c0c0 1px solid;">
                            <?= $price . ' руб.' ?>
                        </td>
                    </tr>
                </table>
            </div>

        </div>
        <div class="row center">
            <p>
                <h3>СПАСИБО ЗА ПОКУПКУ НА НАШЕМ САЙТЕ!</h3>
                Информация по вашему заказу отправлена вам на почту.
            </p>
        </div>
        <hr>
        <div class="row">
            <div class="col-sm-7 bold" style="text-transform: uppercase;">
                Текущее состояние заказа: <?= $model->status->name ?>
            </div>
            <div class="col-sm-5 right">
                <button class="btn btn-success">Перейти к оплате</button>
            </div>
        </div>
        <br>&nbsp;
    </div>
<?php } ?>