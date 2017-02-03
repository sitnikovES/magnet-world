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
$this->params['breadcrumbs'][] = ['label' => 'Магнитные панели на холодильник', 'url' => ['site/catalog']];
$this->params['breadcrumbs'][] = ['label' => \app\models\Productthema::find()->where(['id' => $product['product_thema_id']])->asArray()->one()['name'], 'url' => ['site/catalog', 'theme' => $product['product_thema_id']]];
$this->params['breadcrumbs'][] = $this->title;
?>
<script>
    var mp = <?= $var_list[1]['value'] ?>;
    var pp = <?= $var_list[2]['value'] ?>;
    var packp = <?= $var_list[3]['value'] ?>;
    var montag = <?= $var_list[4]['value'] ?>;
    var postp = <?= $var_list[5]['value'] ?>;
</script>
<div class="site-about">
<?php
   /*$i = 30;
   $text = '$i + 2 * 2';
    eval('$math= '. $text. ';');
    echo $math;*/
?>

    <h1 class="center"><?= Html::encode($this->title) ?></h1>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <div class="col-sm-12">
                    <img src="/img/product/<?= $product['id'] ?>/id_<?= $product['id'] ?>_500x500.jpg" />
                </div>
                <br>&nbsp;
                <?php if(count($image_list)){ ?>
                <div class="col-sm-12">
                    <div id="carousel" class="carousel slide" style="width: 500px;">
                        <ol class="carousel-indicators">
                            <?php foreach($image_list as $key => $image){ ?>
                                <li data-target="#carousel" data-slide-to="<?= $key ?>" <?= (!$key) ? 'class="active"' : '' ?>></li>
                            <?php } ?>
                        </ol>
                        <div class="carousel-inner">
                            <?php foreach($image_list as $key => $image){ ?>
                            <div class="item<?= (!$key) ? ' active' : '' ?>">
                                <img src="/img/product/<?= $product['id'] . '/demo/' . $image['filename'] ?>" alt="<?= $image['alt'] ?>" style="max-height: 350px; max-width: 350px;" />
                                <div class="carousel-caption">
                                    <h3><?= $image['title'] ?></h3>
                                </div>
                            </div>
                            <?php } ?>
                        </div>
                        <a href="#carousel" class="left carousel-control" data-slide="prev" style="background-image: none;">
                            <span class="glyphicon glyphicon-chevron-left"></span>
                        </a>
                        <a href="#carousel" class="right carousel-control" data-slide="next" style="background-image: none;">
                            <span class="glyphicon glyphicon-chevron-right"></span>
                        </a>
                    </div>
                </div>
                <?php } ?>
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

                    <?php foreach ($param_list as $param) { ?>
                    <?= ($param['have_set'] == 0) ? $form->field($model, 'id' . $param['id'])
                            ->textInput(['value' => $param['def_value'], 'title' => $param['hint'], 'data-toggle' => 'tooltip'])
                            ->label(Yii::t('app', $param['name']) ) : null ?>
                    <?php } ?>

                    <?= $form->field($model, 'cn')->textInput(['value' => 1])->label('Количество') ?>

                    <?= $form->field($model, 'price')->hiddenInput(['value' => 0])->label(false) ?>
                    
                    <div class="container" id="span_price">
                        Цена: <span></span>
                    </div>
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