<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Producttype;

/* @var $this yii\web\View */
/* @var $model app\models\Productthema */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productthema-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'name_translit')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'product_type_id')->dropDownList(ArrayHelper::map(Producttype::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'active')->dropDownList(['Нет', 'Да']) ?>

    <?= $form->field($model, 'file')->fileInput() ?>

    <?= $form->field($model, 'pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
