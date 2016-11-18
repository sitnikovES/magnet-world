
<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 17.11.2016
 * Time: 15:01
 */
use yii\widgets\ActiveForm;

$this->registerAssetBundle(\app\modules\admin\assets\DropzoneAsset::className());

?>

<?php

$form = ActiveForm::begin(['options' => ['enctype' => 'multipart/form-data']]) ?>

<?= $form->field($model, 'imageFiles[]')->fileInput(['multiple' => true, 'accept' => 'image/*']) ?>
<button>Submit</button>

<?php ActiveForm::end() ?>

<form action="/admin/product/imageload"  class="dropzone"></form>