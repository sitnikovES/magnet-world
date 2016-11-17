<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Producttype;
use app\models\Productthema;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$this->registerAssetBundle(\app\modules\admin\assets\DropzoneAsset::className());

/*
 *
 * $.ajaxSetup({
    headers: {
        'X-CSRF-Token': $('meta[name="_token"]').attr('content')
    }
});

In your example, you have a typo when adding it to the Dropzone.js ajax post.

    'X-CSRF-Token'

should be

    'X-CSRFToken'


We can set CSRF token in request header.

 xhr = open("POST",logURL,true);
      //Set CSRF token in request header for prevent CSRF attack.
 xhr.setRequestHeader(CSRFHeaderName, CSRFToken);
shareimprove this answer
 */

?>
<div class="container">
    <div class="row">
        <div class="col-md-6">
            <div class="row">
                <div class="product-form">

                    <?php $form = ActiveForm::begin(); ?>

                    <?= $form->field($model, 'name')->textInput(['maxlength' => true]) ?>

                    <?= $form->field($model, 'product_type_id')->dropDownList(ArrayHelper::map(Producttype::find()->all(), 'id', 'name')) ?>

                    <?php if(!$model->isNewRecord){ ?>

                        <?= $form->field($model, 'product_thema_id')->dropDownList(ArrayHelper::map(Productthema::find()->where(['product_type_id' => $model->product_type_id])->all(), 'id', 'name')) ?>

                        <?= $form->field($model, 'active')->dropDownList(['Нет', 'Да']) ?>

                        <?= $form->field($model, 'name_translit')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'title')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'keywords')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'description')->textInput(['maxlength' => true]) ?>

                        <?= $form->field($model, 'text')->textarea(['rows' => 6]) ?>

                    <?php } ?>
                    <div class="form-group">
                        <?= Html::submitButton($model->isNewRecord ? 'Сохранить' : 'Сохранить', ['class' => $model->isNewRecord ? 'btn btn-success' : 'btn btn-primary']) ?>
                    </div>

                    <?php ActiveForm::end(); ?>

                </div>
            </div>
        </div>
        <div class="col-md-6">
            <form action="/admin/product/upload?id=<?= $model->id; ?>"  class="dropzone"></form>
        </div>
    </div>
</div>
