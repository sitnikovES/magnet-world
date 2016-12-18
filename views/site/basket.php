<?php

/* @var $this yii\web\View */
/* @var $form yii\bootstrap\ActiveForm */
/* @var $model app\models\ContactForm */

use yii\helpers\Html;
use yii\bootstrap\ActiveForm;
use yii\captcha\Captcha;

$this->title = 'Корзина';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-contact">
    <h1><?= Html::encode($this->title) ?></h1>
    <?php if(is_array($products)) foreach ($products as $product){{ ?>
        <div class="row">
            <pre>
            <?php print_r($product); ?>
            </pre>
        </div>
        <?php } ?>
            <pre>
            <?php print_r($info); ?>
            </pre>
        <pre>
            <?php print_r($products); ?>
        </pre>
    <?php } else { ?>
        У вас не добавлено ни одного товара.
        <br>
        <br>
        <br>
    <?php } ?>
</div>
