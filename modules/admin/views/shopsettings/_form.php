<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use app\models\Producttype;
use yii\helpers\ArrayHelper;

/* @var $this yii\web\View */
/* @var $model app\models\Shopsettings */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="shopsettings-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'value')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'type_id')->dropDownList(ArrayHelper::map(Producttype::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
