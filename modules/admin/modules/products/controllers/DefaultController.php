<?php

namespace app\modules\admin\modules\products\controllers;

use yii\web\Controller;

/**
 * Default controller for the `products` module
 */
class DefaultController extends BehaviorsController
{
    //public $layout = 'admin/main';
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        return $this->render('index');
    }
}
