<?php

namespace app\modules\admin;
use yii\base\BootstrapInterface;

/**
 * admin module definition class
 */
class admin extends \yii\base\Module implements BootstrapInterface
{
    /**
     * @inheritdoc
     */
    public $controllerNamespace = 'app\modules\admin\controllers';

    /**
     * @inheritdoc
     */
    public function init()
    {
        parent::init();
        $this->layout = 'main';

        // custom initialization code goes here
        \Yii::configure($this, require(__DIR__ . '/config/config.php'));
    }

    public function bootstrap($app)
    {
        // TODO: Implement bootstrap() method.
        $app->getUrlManager()->addRules([
            // правила URL описываются здесь
            'login' => 'default/login',
            'logout' => 'default/logout',
        ], false);
    }
}
