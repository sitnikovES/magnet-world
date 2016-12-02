<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\ProductSimilar */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-md-6">
    <div class="product-similar-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= isset($_GET['product_id']) ? $form->field($model, 'product_id')->hiddenInput(['value' => $_GET['product_id']])->label(false) : $form->field($model, 'product_id')->textInput() ?>

        <?= isset($_GET['product_id']) ? $form->field($model, 'similar_product_id')->dropDownList(ArrayHelper::map(Product::find()->where('id <> ' . $_GET['product_id'])->all(), 'id', 'name')) : $form->field($model, 'similar_product_id')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>
