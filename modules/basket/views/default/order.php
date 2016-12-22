<?php

/* @var $this yii\web\View */

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\OrderStatus;
use app\models\Paytype;
use app\models\Postcompany;

$this->title = 'Оформление заказа';
$this->params['breadcrumbs'][] = $this->title;

$this->registerJsFile('/js/order.js', ['depends' => \yii\web\JqueryAsset::className(), 'position' => \yii\web\View::POS_END], 'order');
?>
<div class="site-about">
    <h1><?= Html::encode($this->title) ?></h1>

    <div class="container">

            <div class="orders-form">

                <?php $form = ActiveForm::begin(); ?>

                <div class="row">
                    <div class="col-sm-6">
                        <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'phone')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'postindex')->textInput() ?>

                        <?= $form->field($model, 'address')->textarea(['maxlength' => true]) ?>

                        <?= $form->field($model, 'email')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'note')->textarea() ?>
                    </div>
                    <div class="col-sm-6">

                        <?= $form->field($model, 'pay_type_id')->radioList(ArrayHelper::map(Paytype::find()->where(['active' => 1])->all(), 'id', 'name')) ?>

                        <?= $form->field($model, 'post_type_id')->radioList(ArrayHelper::map(Postcompany::find()->where(['active' => 1])->all(), 'id', 'name')) ?>

                    </div>
                </div>



                <div class="form-group">
                    <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                </div>

                <?php ActiveForm::end(); ?>

        </div>
    </div>
</div>