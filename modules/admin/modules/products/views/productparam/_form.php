<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Producttype;

/* @var $this yii\web\View */
/* @var $model app\models\Productparam */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="productparam-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'product_type_id')->dropDownList(ArrayHelper::map(Producttype::find()->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'active')->dropDownList(['Нет', 'Да']) ?>

    <?= $form->field($model, 'have_set')->dropDownList($model::$valueType) ?>

    <?= $form->field($model, 'hint')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'pos')->textInput(['maxlength' => true]) ?>

    <?= $form->field($model, 'def_value')->textInput(['maxlength' => true]) ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
