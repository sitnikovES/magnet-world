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
}

?>
<?php if(count($products)){ ?>
    <table style="border: 1px solid black;">
        <?php foreach ($products as $product){ ?>
        <tr>
            <td>
                <a href="<?= 'http://' . $_SERVER['SERVER_NAME'] . \yii\helpers\Url::to(['site/product', 'id' => $product['product_id']]) ?>">
                <?= $product_list[$product['product_id']]['producttype']['name'] . ' - ' . $product_list[$product['product_id']]['name'] ?></td>
                </a>
            <td><img src="/img/product/<?= $product['product_id'] ?>/<?= 'id_' . $product['product_id'] . '_150x150.jpg' ?>"></td>
            <td style="font-weight: bold">
                <div>Стоимость: <?= $product['price'] ?> руб.</div>
                <div>Количество: <?= $product['cn'] ?> шт.</div>
                <?php foreach ($product as $key => $value){ if(is_numeric($key)){ ?>
                <?= $value ? '<div>' . $param_list[$key]['name'] . ' - ' . $value . '</div>' : '' ?>
            <?php }} ?>
            </td>
        </tr>
        <?php } ?>
    </table>
<?php } ?>