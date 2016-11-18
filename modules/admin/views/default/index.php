<?php
use yii\helpers\Url;
use yii\helpers\Html;
?>
<div class="admin-default-index">
    <p>
        <label>Магазин</label><br>
        <?php
        echo Html::a('Настройки', Url::to(['shopsettings/']));
        echo '<br>';
        echo Html::a('Пользователи', Url::to(['user/']));
        echo '<br>';
        echo '<br>';
        ?>
    </p>
    <p>
        <label><?= Html::a('Товары', Url::to(['products/'])) ?></label><br>
        <?php
        echo Html::a('Товары', Url::to(['products/product']));
        echo '<br>';
        echo Html::a('Типы товаров', Url::to(['products/producttype/']));
        echo '<br>';
        echo Html::a('Параметры товаров', Url::to(['products/productparam/']));
        echo '<br>';
        echo Html::a('Наборы значений параметров товаров', Url::to(['products/productparamset/']));
        echo '<br>';
        echo Html::a('Темы товаров', Url::to(['products/productthema/']));
        echo '<br>';
        echo Html::a('Цвета наклеек', Url::to(['products/colors/']));
        echo '<br>'; ?>
    </p>
    <p>
        <label>Работа с заказами</label><br>
        <?php
        echo Html::a('Заказы', Url::to(['orders/']));
        echo '<br>';
        echo Html::a('Содержимое заказов', Url::to(['ordercontent/']));
        echo '<br>';
        echo Html::a('Позиции заказов', Url::to(['orderproductparam/']));
        echo '<br>';
        echo Html::a('Статусы заказов', Url::to(['orderstatus/']));
        echo '<br>';
        echo Html::a('Способы оплаты', Url::to(['paytype/']));
        echo '<br>';
        echo Html::a('Способы доставки', Url::to(['postcompany/']));
        echo '<br>';
        echo '<br>'; ?>
    </p>
</div>