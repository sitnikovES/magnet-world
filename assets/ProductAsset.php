<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 16.12.2016
 * Time: 16:03
 */

namespace app\assets;

use yii\web\AssetBundle;

class ProductAsset extends AssetBundle {
    public $basePath = '@webroot';
    public $baseUrl = '@web';
    public $jsOptions = ['position' => \yii\web\View::POS_END];
    public $css = [
        'css/product.css',
    ];
    public $js = [
        'js/product.js',
    ];
    public $depends = [
        'yii\web\YiiAsset',
        'yii\bootstrap\BootstrapAsset',
    ];
}