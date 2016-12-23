<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use app\assets\ProductAsset;
use yii\widgets\ActiveForm;
use yii\helpers\Url;


$this->title = $product['producttype']['name'] . ' - ' . $product['name'];
$this->registerMetaTag(['name' => 'keywords', 'content' => $product['keywords']]);
$this->registerMetaTag(['name' => 'description', 'content' => $product['description']]);

$this->registerAssetBundle(ProductAsset::className());

$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1 class="center"><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="col-sm-12">
                    <img src="/img/product/<?= $product['id'] ?>/id_<?= $product['id'] ?>_500x500.jpg" />
                </div>
                <br>&nbsp;
                <div class="col-sm-12">
                    <div id="carousel" class="carousel slide" style="width: 500px;">
                        <ol class="carousel-indicators">
                            <li class="active" data-target="#carousel" data-slide-to="0"></li>
                            <li data-target="#carousel" data-slide-to="1"></li>
                            <li data-target="#carousel" data-slide-to="2"></li>
                        </ol>
                        <div class="carousel-inner">
                            <div class="item active">
                                <img src="/img/product/1/id_1_500x500.jpg" />
                                <div class="carousel-caption">
                                    <h3><?= $product['name'] ?></h3>
                                    <p>Какой-то текст</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/img/product/2/id_2_500x500.jpg" />
                                <div class="carousel-caption">
                                    <h3><?= $product['name'] ?></h3>
                                    <p>Какой-то текст</p>
                                </div>
                            </div>
                            <div class="item">
                                <img src="/img/product/3/id_3_500x500.jpg" />
                                <div class="carousel-caption">
                                    <h3><?= $product['name'] ?></h3>
                                    <p>Какой-то текст</p>
                                </div>
                            </div>
                        </div>
                        <a href="#carousel" class="left carousel-control" data-slide="prev" style="background-image: none;">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#carousel" class="right carousel-control" data-slide="next" style="background-image: none;">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
            </div>
            <div class="col-md-6">
                <div class="col-sm-12">
                    <?= $product['text'] ?>
                </div>
                <div class="col-sm-12">
                    <?php $form = ActiveForm::begin([
                        'action' => Url::to(['productadd']),
                    ]) ?>

                    <?= $form->field($model, 'product_id')->hiddenInput(['value' => $product['id']])->label(false) ?>
                    <?= $form->field($model, 'price')->hiddenInput(['value' => 0])->label(false) ?>

                    <?php foreach ($param_list as $param) { ?>
                    <?= ($param['have_set'] == 0) ? $form->field($model, 'id' . $param['id'])
                            ->textInput(['value' => $param['def_value'], 'title' => $param['hint'], 'data-toggle' => 'tooltip'])
                            ->label(Yii::t('app', $param['name']) ) : null ?>
                    <?php } ?>

                    <?= $form->field($model, 'cn')->textInput(['value' => 1])->label('Количество') ?>

                    <div class="form-group">
                        <?= Html::submitButton('Добавить в корзину', ['class' => 'btn btn-success']) ?>
                    </div>
                    <?php ActiveForm::end() ?>
                </div>
                <div class="col-sm-12">
                    <?= $product['producttype']['text'] ?>
                </div>
            </div>
        </div>
    </div>
</div>
