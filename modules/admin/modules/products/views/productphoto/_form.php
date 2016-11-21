<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/* @var $this yii\web\View */
/* @var $model app\models\ProductPhoto */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="product-photo-form">
<?=
    Html::img('/img/product/' . $model->product_id . '/demo/' . $model->filename,
    [
    'alt' => $model->alt,
    'style' => 'max-height: 75px; max-width: 150px;'
    ]);
?>
    <?php $form = ActiveForm::begin(); ?>

    <?php /*$form->field($model, 'product_id')->hiddenInput()*/ ?>

    <?php /*$form->field($model, 'filename')->hiddenInput()*/ ?>

    <?= $form->field($model, 'hide')->dropDownList(['Нет', 'Да']) ?>

    <?= $form->field($model, 'alt')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
