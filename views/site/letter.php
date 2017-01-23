<?php
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

    $post = \app\models\Postcompany::find()->where(['id' => $model->post_type_id])->one();

    $price = $post->price;
}

?>
<?php if(count($products)){ ?>
    Данные по заказу<br>&nbsp;
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
            <td class="bold"><?= $post->name ?></td>
        </tr>
        <tr>
            <td>Способ оплаты:&nbsp;</td>
            <td class="bold"><?= \app\models\Paytype::find()->where(['id' => $model->pay_type_id])->one()->name ?></td>
        </tr>
    </table>

    <table cellspacing="0" style="border-top: #c0c0c0 1px solid;">
        <?php foreach ($products as $product){ ?>
        <tr>
            <td style="border-bottom: #c0c0c0 1px solid;">
                <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . \yii\helpers\Url::to(['/site/product', 'id' => $product['product_id']]) ?>">
                <?= $product_list[$product['product_id']]['producttype']['name'] . ' - ' . $product_list[$product['product_id']]['name'] ?>
                </a>
            </td>
            <td style="border-bottom: #c0c0c0 1px solid;"><img src="<?= 'http://' . $_SERVER['SERVER_NAME'] ?>/img/product/<?= $product['product_id'] ?>/<?= 'id_' . $product['product_id'] . '_150x150.jpg' ?>"></td>
            <td style="border-bottom: #c0c0c0 1px solid; font-weight: bold;">
                <div>Стоимость: <?= $product['price'] ?> руб.</div>
                <div>Количество: <?= $product['cnt'] ?> шт.</div>
                <?php $price += $product['price']; foreach ($product as $key => $value){ if(is_numeric($key)){ ?>
                <?= $value ? '<div>' . $param_list[$key]['name'] . ' - ' . $value . '</div>' : '' ?>
            <?php }} ?>
            </td>
        </tr>
        <?php } ?>
        <?php if($post->price){ ?>
        <tr>
            <td colspan="2" style="border-bottom: #c0c0c0 1px solid;">
                Стоимость отправки:
            </td>
            <td style="border-bottom: #c0c0c0 1px solid;">
                <?= $post->price . ' руб.' ?>
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
    <br>&nbsp;
    <pre>
        <?php /*print_r($model);*/ ?>
        <?php print_r($products); ?>
    </pre>
<?php } ?>