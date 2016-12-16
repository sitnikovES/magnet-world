<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 16.12.2016
 * Time: 16:26
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class TinymceAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $js = [
        'js/tinymce/jquery.tinymce.min.js',
        'js/tinymce/tinymce.min.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
} 