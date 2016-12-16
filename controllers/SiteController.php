<?php

namespace app\controllers;

use app\models\Product;
use app\models\Productthema;
use Yii;
use yii\db\Query;
use yii\filters\AccessControl;
use yii\web\Controller;
use yii\filters\VerbFilter;
use app\models\LoginForm;
use app\models\ContactForm;
use app\models\Postcompany;
use app\models\Producttype;

class SiteController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::className(),
                'only' => ['logout'],
                'rules' => [
                    [
                        'actions' => ['logout'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                ],
            ],
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'logout' => ['post'],
                ],
            ],
        ];
    }

    /**
     * @inheritdoc
     */
    public function actions()
    {
        return [
            'error' => [
                'class' => 'yii\web\ErrorAction',
            ],
            'captcha' => [
                'class' => 'yii\captcha\CaptchaAction',
                'fixedVerifyCode' => YII_ENV_TEST ? 'testme' : null,
            ],
        ];
    }

    /**
     * Displays homepage.
     *
     * @return string
     */
    public function actionIndex()
    {
        //Новинки
        $new_product = Product::find()->where(['{{%product}}.active' => 1])->joinWith('producttype', true, 'LEFT JOIN')->limit(3)->orderBy('id DESC')->asArray()->all();

        //Популярные
        $pop_product = Product::find()
            ->where(['{{%product}}.active' => 1])
            ->joinWith('producttype', true, 'LEFT JOIN')
            ->where('{{%product}}.id IN (SELECT product_id FROM {{%product_popular}})')
            //->where(['{{%product}}.id' => [1, 4, 5]])
            ->limit(3)
            ->orderBy('id DESC')
            ->asArray()
            ->all();

        return $this->render('index', [
            'pop_product' => $pop_product,
            'new_product' => $new_product,
        ]);
    }

    /**
     * Login action.
     *
     * @return string
     */
    public function actionLogin()
    {
        if (!Yii::$app->user->isGuest) {
            return $this->goHome();
        }

        $model = new LoginForm();
        if ($model->load(Yii::$app->request->post()) && $model->login()) {
            return $this->goBack();
        }
        return $this->render('login', [
            'model' => $model,
        ]);
    }

    /**
     * Logout action.
     *
     * @return string
     */
    public function actionLogout()
    {
        Yii::$app->user->logout();

        return $this->goHome();
    }

    /**
     * Displays contact page.
     *
     * @return string
     */
    public function actionContact()
    {
        $model = new ContactForm();
        if ($model->load(Yii::$app->request->post()) && $model->contact(Yii::$app->params['adminEmail'])) {
            Yii::$app->session->setFlash('contactFormSubmitted');

            return $this->refresh();
        }
        return $this->render('contact', [
            'model' => $model,
        ]);
    }
    
    /**
     * Displays catalog page.
     *
     * @return string
     */
    public function actionCatalog()
    {
        if(Yii::$app->request->get('theme')){
            $id = Yii::$app->request->get('theme');
            $theme = Productthema::find()
                ->where(['id' => $id])
                ->asArray()
                ->one();
            $type = Producttype::find()
                ->where(['id' => $theme['product_type_id']])
                ->asArray()
                ->one();

            $products = Product::find()
                ->where(['active' => 1, 'product_thema_id' => $theme['id']])
                ->asArray()
                ->orderBy('name')
                ->all();

            return $this->render('themaproductlist',[
                'theme' => $theme,
                'type' => $type,
                'products' => $products,
            ]);
        }
        else {
            $products = Producttype::find()->where(['{{%product_type}}.active' => 1, '{{%product_thema}}.active' => 1])->joinWith('themes', true, 'RIGHT JOIN')->orderBy(['{{%product_thema}}.pos' => 'SORT_ASK', '{{%product_thema}}.name' => 'SORT_ASK'])->asArray()->all();
            return $this->render('catalog', [
                'products' => $products,
            ]);
        }

    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionAbout()
    {
        return $this->render('about');
    }

    /**
     * Displays about page.
     *
     * @return string
     */
    public function actionProduct($id)
    {
        return $this->render('Product', [
            'product' => $this->findProduct($id),
        ]);
    }


    public function findProduct($id){
        if (($product = Product::find()->where(['id' => $id])->with('producttype')->with('images')->asArray()->one()) !== null) {
            return $product;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

    public function actionDostavka()
    {
        $fixed = array();
        $fixed_nl = array();
        $free = array();
        $free_nl = array();
        $postcompany = Postcompany::find()->where(['active' => 1])->orderBy('price, name')->asArray()->all();
        foreach ($postcompany as $post){
            if($post['price'] == 0){
                array_push($free, $post);
                array_push($free_nl, $post['name']);
            }
            else {
                array_push($fixed, $post);
                array_push($fixed_nl, $post['name']);
            }
        }
        return $this->render('dostavka', [
            'fixed' => $fixed,
            'fixed_nl' => $fixed_nl,
            'free' => $free,
            'free_nl' => $free_nl,
        ]);
    }
}