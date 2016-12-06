<?php
use yii\helpers\Url;
use yii\helpers\Html;

$this->title = 'Работа с товарами';
$this->params['breadcrumbs'][] = $this->title;
?>


<div class="products-default-index">
    <p>
        <label><?= $this->title ?></label><br>
        <?php
        echo Html::a('Список товаров', Url::to(['product/']));
        echo '<br>';
        echo Html::a('Типы товаров', Url::to(['producttype/']));
        echo '<br>';
        echo Html::a('Параметры товаров', Url::to(['productparam/']));
        echo '<br>';
        echo Html::a('Наборы значений параметров товаров', Url::to(['productparamset/']));
        echo '<br>';
        echo Html::a('Темы товаров', Url::to(['productthema/']));
        echo '<br>';
        echo Html::a('Цвета наклеек', Url::to(['colors/']));
        echo '<br>';
        echo Html::a('Популярные', Url::to(['productpopular/']));
        echo '<br>';?>
    </p>
</div>
