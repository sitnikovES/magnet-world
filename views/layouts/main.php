<?php

/* @var $this \yii\web\View */
/* @var $content string */

use yii\helpers\Html;
use yii\bootstrap\Nav;
use yii\bootstrap\NavBar;
use yii\widgets\Breadcrumbs;
use app\assets\AppAsset;
//use app\srv\Servdata;
use yii\helpers\Url;

$session = Yii::$app->session;
if(!$session->isActive){
    $session->open();
}
//$session->remove('products');

AppAsset::register($this);
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" xmlns="http://www.w3.org/1999/html">
<head>
    <meta charset="<?= Yii::$app->charset ?>">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <?= Html::csrfMetaTags() ?>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
</head>
<body>
<?php $this->beginBody() ?>
<div class="container" style="text-align: center; margin-top: 20px; margin-bottom: 15px;">
    <div class="row">
        <div class="col-sm-4" style="font-size: 200%">
                <i class="fa fa-phone"></i>&nbsp;+7 (913) 311-60-49
        </div>
        <div class="col-sm-4"><span style="font-size: 250%; color: #5bc0de;">Магнитный мир</span></div>
        <div class="col-sm-4">
            <div class="col-md-4">
                <?=  Html::a('<i class="fa fa-comments-o" style="font-size: 300%"></i>&nbsp;Вопрос-ответ',
                    Url::to(['site/dostavka'])) ?>
            </div>
            <div class="col-md-4">
                <?= Html::a('<i class="fa fa-truck fa-flip-horizontal" style="font-size: 300%"></i>&nbsp;Доставка',
                    Url::to(['site/dostavka'])) ?>

            </div>
            <div class="col-md-4">
               <?=  Html::a('<i class="fa fa-shopping-cart" style="font-size: 300%"></i>&nbsp;Корзина(' . ((isset($_SESSION) and (isset($_SESSION['products'])))? count($_SESSION['products']) : 0) . ')',
                   Url::to(['/basket'])) ?>
            </div>
        </div>
    </div>
</div>
<div class="container">
    <div class="row">
        <?php
        NavBar::begin([
            'brandLabel' => 'Magnet-World.ru',
            'brandUrl' => Yii::$app->homeUrl,
            'options' => [
                'class' => 'navbar-inverse',
                //'class' => 'navbar-inverse navbar-fixed-top',
            ],
        ]);
        echo Nav::widget([
            'options' => ['class' => 'navbar-nav navbar-right'],
            'items' => [
                ['label' => 'Главная', 'url' => ['/site/index']],
                ['label' => 'Каталог', 'url' => ['/site/catalog']],
                ['label' => 'Доставка', 'url' => ['/site/dostavka']],
                ['label' => 'Оплата', 'url' => ['/site/oplata']],
                ['label' => 'Контакты', 'url' => ['/site/contact']],
            ],
        ]);
        
        NavBar::end();
        ?>
    </div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'homeLink' => ['label' => 'Главная', 'url' => '/'],
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <?= $content ?>
    </div>
</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; Магнитный мир <?= date('Y') ?></p>

        <p class="pull-right"><?= Yii::powered() ?></p>
    </div>
</footer>
<div class="modal" id="modal-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <button class="close" type="button" data-dismiss="modal">
                    <i class="glyphicon glyphicon-star"></i>
                </button>
                <h4 class="modal-title">Называние окна</h4>
            </div>
            <div class="modal-body">
                <p>
                    Это модальное окно!
                </p>
            </div>
            <div class="modal-footer">
                <button class="btn btn-danger" type="button" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>
