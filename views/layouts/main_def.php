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

<div class="wrap">
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
            ['label' => 'Home', 'url' => ['/site/index']],
            ['label' => 'Доставка', 'url' => ['/site/index']],
            ['label' => 'О магнитрых панелях', 'url' => ['/site/index']],
            ['label' => 'О нас', 'url' => ['/site/about']],
            ['label' => 'Контакты', 'url' => ['/site/contact']],
            ['label' => 'Admin', 'url' => ['/admin/']],
            /*Yii::$app->user->isGuest ? (
                ['label' => 'Login', 'url' => ['/site/login']]
            ) : (
                '<li>'
                . Html::beginForm(['/site/logout'], 'post', ['class' => 'navbar-form'])
                . Html::submitButton(
                    'Logout (' . Yii::$app->user->identity->username . ')',
                    ['class' => 'btn btn-link']
                )
                . Html::endForm()
                . '</li>'
            )*/
        ],
    ]);
    NavBar::end();
    ?>
    <div class="container">
        <form action="" class="navbar-form navbar-right">
            <div class="form-group">
                <input type="text" class="form-control" placeholder="E-mail" value="" />
                <input type="password" class="form-control" placeholder="Пароль" value="" />
                <button type="submit" class="btn btn-info">Вход</button>
            </div>
        </form>
    </div>
    <div class="container">
        <?= Breadcrumbs::widget([
            'links' => isset($this->params['breadcrumbs']) ? $this->params['breadcrumbs'] : [],
        ]) ?>
        <div class="container">
           <p>
               <i class="glyphicon glyphicon-user" style="font-size: 300%"></i>
               <a href="#" class="btn btn-success btn-block">Кнопка</a>
               <a href="#" class="btn btn-default">Кнопка</a>
               <a href="#" class="btn btn-danger">Кнопка</a>
               <a href="#" class="btn btn-info">Кнопка</a>
               <a href="#" class="btn btn-primary btn-lg">Кнопка lg</a>
               <a href="#" class="btn btn-primary">Кнопка</a>
               <a href="#" class="btn btn-primary btn-sm">Кнопка sm</a>
               <a href="#" class="btn btn-primary btn-xs">Кнопка xs</a>
               <a href="#" class="btn btn-info">Кнопка</a>
               <a href="#" class="btn btn-success">Кнопка</a>
               <a href="#" class="btn btn-toolbar">Кнопка</a>
               <a href="#" class="btn btn-warning">Кнопка</a>
           </p>
        </div>
        <div class="container">
            <div class="row">
                <div class="btn-toolbar">
                    <div class="btn-group btn-group-lg">
                        <a href="#" class="btn btn-success">Кнопка</a>
                        <a href="#" class="btn btn-success">Кнопка</a>
                        <a href="#" class="btn btn-success">Кнопка</a>
                    </div>
                    <div class="btn-group btn-group-justified">
                        <a href="#" class="btn btn-success">Кнопка</a>
                        <a href="#" class="btn btn-success">Кнопка</a>
                        <a href="#" class="btn btn-success">Кнопка</a>
                    </div>
                    <div class="btn-group">
                        <a href="#" class="btn btn-success">Кнопка</a>
                        <a href="#" class="btn btn-success">Кнопка</a>
                        <a href="#" class="btn btn-success">Кнопка</a>
                    </div>
                </div>
            </div>
        </div>
        <div class="container">
            <div class="row">
                <div class="col-md-4">
                    <div class="btn-group">
                        <button class="btn btn-default dropdown-toggle" data-toggle="dropdown">
                            Выпадающее меню <span class="caret"></span>
                        </button>
                        <ul class="dropdown-menu">
                            <li><a href="#">item1</a></li>
                            <li><a href="#">item1</a></li>
                            <li><a href="#">item1</a></li>
                            <li><a href="#">item1</a></li>
                            <li><a href="#">item1</a></li>
                            <li><a href="#">item1</a></li>
                            <li><a href="#">item1</a></li>
                        </ul>
                    </div>
                </div>
                <div class="col-md-4">
                    <div class="tabs">
                        <ul class="nav nav-tabs">
                            <li class="active"><a href="#tab-1" data-toggle="tab">Вкладка 1</a></li>
                            <li><a href="#tab-2" data-toggle="tab">Вкладка 2</a></li>
                            <li><a href="#tab-3" data-toggle="tab">Вкладка 3</a></li>
                        </ul>
                    </div>
                    <div class="tab-content">
                        <div class="tab-pane fade in active" id="tab-1">
                            <p>Параграф 1</p>
                        </div>
                        <div class="tab-pane fade" id="tab-2">
                            <p>Параграф 2</p>
                        </div>
                        <div class="tab-pane fade" id="tab-3">
                            <p>Параграф 3</p>
                        </div>
                    </div>
                </div>
                <div class="col-md-4">
                    <a href="#spoiler-1" data-toggle="collapse" class="btn btn-primary">Подсказка</a>
                    <div class="collapse" id="spoiler-1">
                        <div class="well">
                            <p>
                                Параграф с текстом
                            </p>
                        </div>
                    </div>
                    <br>
                    <button type="button" class="btn btn-success" data-toggle="modal" data-target="#modal-1">Открыть модальное окно</button>
                </div>
            </div>
        </div>
        <?= $content ?>
    </div>
    <br>
    <br>

</div>

<footer class="footer">
    <div class="container">
        <p class="pull-left">&copy; My Company <?= date('Y') ?></p>

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
