<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 17.11.2016
 * Time: 10:02
 */

namespace app\modules\admin\assets;

use yii\web\AssetBundle;

class DropzoneAsset extends AssetBundle
{
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_HEAD];
    public $css = [
        'dropzone/dropzone.min.css',
    ];
    public $js = [
        'dropzone/dropzone.js',
        //'dropzone/dropzone.min.js',
    ];
    public $depends = [

    ];
}