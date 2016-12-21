<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\OrderStatus;
use app\models\Paytype;
use app\models\Postcompany;

$this->title = 'About';
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container">
        <div class="col-sm-6">
            <div class="orders-form">

                <?php $form = ActiveForm::begin(); ?>

                <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'address')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'postindex')->textInput() ?>

                <?= $form->field($model, 'order_status_id')->dropDownList(ArrayHelper::map(OrderStatus::find()->all(), 'id', 'name')) ?>

                <?= $form->field($model, 'pay_type_id')->dropDownList(ArrayHelper::map(Paytype::find()->all(), 'id', 'name')) ?>

                <?= $form->field($model, 'post_type_id')->dropDownList(ArrayHelper::map(Postcompany::find()->all() , 'id', 'name')) ?>

                <?= $form->field($model, 'post_code')->textInput(['maxlength' => true]) ?>

                <?= $form->field($model, 'note')->textarea() ?>

                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

            </div>
        </div>
    </div>
</div>
