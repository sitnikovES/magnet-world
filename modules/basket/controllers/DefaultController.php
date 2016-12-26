<?php

namespace app\modules\basket\controllers;

use app\models\OrderContent;
use Yii;
use app\models\Orders;
use yii\web\Controller;
use app\models\Product;
use app\models\Productparam;

/**
 * Default controller for the `basket` module
 */
class DefaultController extends Controller
{
    /**
     * Renders the index view for the module
     * @return string
     */
    public function actionIndex()
    {
        $session = Yii::$app->session;
        if(!$session->isActive){
            $session->open();
        }

        $products = isset($session['products']) ? $session['products'] : null;
        $info = [];
        if(is_array($products)){
            $id = [];
            $param_list = array();
            $product_type = array();

            foreach ($products as $product){
                array_push($id, $product['product_id']);
                foreach($product as $key => $value){
                    if(is_numeric($key)){
                        array_push($param_list, $key);
                    }
                }
            }

            //получаем выборку товаров в корзине
            $tmp = Product::find()->where(['id' => $id])->with('producttype')->asArray()->all();
            foreach ($tmp as $t){
                $info[$t['id']] = $t;
                array_push($product_type, $t['product_type_id']);
            }

            //получаем названия параметров
            $tmp = Productparam::find()->where(['id' => $param_list])->asArray()->all();
            foreach ($tmp as $t){
                $param_list[$t['id']] = $t;
            }

            //получаем названия параметров
            $tmp = Productparam::find()->where(['id' => $param_list])->asArray()->all();
            foreach ($tmp as $t){
                $param_list[$t['id']] = $t;
            }
            return $this->render('index', [
                'products' => $products,
                'info' => $info,
                'param_list' => $param_list,
            ]);
        }

        return $this->render('index');
    }

    public function actionDel($id){
        $session = Yii::$app->session;
        $message['name'] = 'no messages';
        $message['param'] = '';
        if(!$session->isActive){
            $session->open();
        }

        if(isset($session['products']) and isset($session['products'][$id])){
            $products = $session['products'];
            unset($products[$id]);
            $session['products'] = $products;
        }
        return $this->redirect(['/basket']);
    }

    public function actionOrder(){

        $model = new Orders();
        $session = Yii::$app->session;
        $message['name'] = 'no messages';
        $message['param'] = '';
        if(!$session->isActive){
            $session->open();
        }
        $products = isset($session['products']) ? $session['products'] : null;

        $model = new Orders();
        if ($model->load(Yii::$app->request->post()) && $model->save()) {

            $session = Yii::$app->session;
            if(!$session->isActive){
                $session->open();
            }
            if(isset($products)){
                foreach ($products as $product){
                    $mdl = new OrderContent();
                    $mdl->order_id = $model->id;
                    $mdl->product_id = $product['product_id'];
                    $mdl->price = $product['price'];
                    $mdl->cnt = $product['cn'];
                    if(!$mdl->validate()){
                        $message['name'] = "Ошибка валидации";
                        $message['param'] = $product;
                    }
                    else {
                        array_push($message, $product);
                    };
                    $mdl->save();
                    foreach($product as $key => $value){
                        if(is_numeric($key)){
                            $mdl->addParam($key, $value);
                        }
                    }
                }
                $session->destroy();
            }

            Yii::$app->mailer->compose()
                ->setTo(['mama7361@mail.ru', 'shop@magnet-world.ru', $model->email])
                ->setFrom('shop@magnet-world.ru') //magnetmaster
                ->setSubject('Новый заказ(' . $this->name . ')')
                ->setTextBody(
                    $this->name
                    . '
                '
                    . $this->mes)
                ->send();

            return $this->redirect(['thanks']);
        } else {
            return $this->render('order', [
                'model' => $model,
            ]);
        }
    }

    public function actionThanks(){
        return $this->render('thanks');
    }
}
