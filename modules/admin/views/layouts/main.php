<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>

<div class="wrap">
    <?php
    NavBar::begin([
        'brandLabel' => 'Magnet-World',
        'brandUrl' => Yii::$app->homeUrl,
        'options' => [
            'class' => 'navbar-inverse navbar-fixed-top',
        ],
    ]);
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav navbar-right'],
        'items' => [
            ['label' => 'Главная', 'url' => ['/admin']],
            ['label' => 'Разработка', 'items' => [
                ['label' => 'Gii', 'url' => ['/gii']],
            ]],
            ['label' => 'Магазин', 'items' => [
                ['label' => 'Настройки', 'url' => ['/admin/shopsettings']],
                ['label' => 'Пользователи', 'url' => ['/admin/user']],
            ]],
            ['label' => 'Работа с товарами', 'items' => [
                ['label' => 'Список товаров', 'url'=>['/admin/products/product']],
                ['label' => 'Типы товаров', 'url'=>['/admin/products/producttype']],
                ['label' => 'Параметры товаров', 'url'=>['/admin/products/productparam']],
                ['label' => 'Наборы значений параметров товаров', 'url'=>['/admin/products/productparamset']],
                ['label' => 'Темы товаров', 'url'=>['/admin/products/productthema']],
                ['label' => 'Цвета наклеек', 'url'=>['/admin/products/colors']],
                ['label' => 'Размеры подгружаемых фото', 'url'=>['/admin/products/imagesize']],
                ['label' => 'Популярные', 'url'=>['/admin/products/productpopular']],
            ]],
            ['label' => 'Работа с заказами', 'items' => [
                ['label' => 'Заказы', 'url' => ['/admin/orders']],
                ['label' => 'Содержимое заказов', 'url' => ['/admin/ordercontent']],
                ['label' => 'Позиции заказов', 'url' => ['/admin/orderproductparam']],
                ['label' => 'Биллинг', 'url' => ['/admin/cashflow']],
                ['label' => 'Статусы заказов', 'url' => ['/admin/orderstatus']],
                ['label' => 'Способы оплаты', 'url'=>['/admin/paytype']],
                ['label' => 'Способы отправки', 'url'=>['/admin/postcompany']],
            ]],
            ['label' => 'Статистика', 'items' => [
            ]],
            Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/admin/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/admin/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Выход (' . Yii::$app->user->identity->login . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )
        ],
    ]);
    NavBar::end();
    ?>

    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => 'Администрирование', 'url' => '/admin'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
