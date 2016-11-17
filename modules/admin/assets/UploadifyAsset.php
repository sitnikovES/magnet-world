<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 17.11.2016
 * Time: 10:02
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class UploadifyAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $css = [
        'uploadify/uploadify.css',
    ];
    public $js = [
        'uploadify/jquery.uploadify.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}