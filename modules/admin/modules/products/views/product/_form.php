<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Producttype;
use app\models\Productthema;
use app\modules\admin\assets\TinymceAsset;

/* @var $this yii\web\View */
/* @var $model app\models\Product */
/* @var $form yii\widgets\ActiveForm */

$this->registerAssetBundle(\app\modules\admin\assets\DropzoneAsset::className());
$this->registerAssetBundle(TinymceAsset::className());

$this->registerJsFile('js/admin/product.js',['depends' => TinymceAsset::className()]);
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

                        <?= $form->field($model, 'file')->fileInput(); ?>

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
            <?php if(!$model->isNewRecord){ ?>
            <form action="/admin/products/product/upload?id=<?= $model->id; ?>"  class="dropzone">
                <?= Html::hiddenInput(Yii::$app->getRequest()->csrfParam, Yii::$app->getRequest()->getCsrfToken(), []) ?>
            </form>
            <div class="row" id="imagelist">

            </div>
            <?php } ?>
        </div>
    </div>
</div>
