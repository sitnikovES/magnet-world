<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Producttype;

/* @var $this yii\web\View */
/* @var $model app\models\Imagesize */
/* @var $form yii\widgets\ActiveForm */
?>
<div class="col-sm-6 col-md-4 col-lg-3">
    <div class="imagesize-form">

        <?php $form = ActiveForm::begin(); ?>

        <?= $form->field($model, 'cat')->hiddenInput(['value' => 1]) ?>

        <?= $form->field($model, 'some_id')->dropDownList(ArrayHelper::map(Producttype::find()->all(), 'id', 'name')) ?>

        <?= $form->field($model, 'width')->textInput() ?>

        <?= $form->field($model, 'height')->textInput() ?>

        <div class="form-group">
            <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
        </div>

        <?php ActiveForm::end(); ?>

    </div>
</div>