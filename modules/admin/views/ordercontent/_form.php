<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Product;

/* @var $this yii\web\View */
/* @var $model app\models\OrderContent */
/* @var $form yii\widgets\ActiveForm */
?>

<div class="order-content-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'order_id')->dropDownList([$model->order_id =>$model->order_id]) ?>

    <?= $form->field($model, 'product_id')->dropDownList(ArrayHelper::map(Product::find()->where(['product_type_id' => $model->product->product_type_id])->all(), 'id', 'name')) ?>

    <?= $form->field($model, 'cnt')->textInput() ?>

    <?= $form->field($model, 'price')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
