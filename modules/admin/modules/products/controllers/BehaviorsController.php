<?php
namespace app\modules\admin\modules\products\controllers;

use Yii;
use \yii\web\Controller;
use yii\filters\AccessControl;
use yii\filters\VerbFilter;

class BehaviorsController extends Controller {
	public function behaviors()
	{
		return [
			'verbs' => [
				'class' => VerbFilter::className(),
				'actions' => [
					'delete' => ['post'],
				],
			],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
                        'controllers' => ['admin/default'],
                        'actions' => ['login'],
                        'verbs' => ['GET', 'POST'],
                        'allow' => true,
                        'roles' => ['?'],
                    ],
                    [
                        //'controllers' => ['admin/default'],
                        'allow' => true,
                        'roles' => ['@'],
                    ],
                    /*[
                        'allow' => true,
                        //'controllers' => ['admin/shopsettings', 'admin/user'],
                        'actions' => ['create', 'view', 'update', 'index'],
                        'roles' => ['@'],
                    ],*/
				],
			],
		];
	}
}

/*class BehaviorsController extends Controller {
	public function behaviors(){
		return [
			'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['post'],
                ],
            ],
			'access' => [
				'class' => AccessControl::className(),
				'rules' => [
					[
						'allow' =>true,
						'controllers'=>['reg'],
						'actions' => ['reg', 'login'],
						'verbs'=>['GET', 'POST'],
						'roles'=>['?']
					],
					
					[ //тарифные зоны только чтение
						'allow' => true,
						'controllers' => ['areatype'],
						'actions' => ['index'],
						'roles' => ['@'],
					],
					
					[ //тарифные зоны только чтение
						'allow' => false,
						'controllers' => ['areatype'],
						'actions' => ['create', 'view', 'update'],
						'roles' => ['?', '@'],
					],
					
					[
						'allow' => true,
						'controllers' => ['work'],
						'roles' => ['@'],
					],
					[
						'allow' =>true,
						'controllers'=>['reg'],
						'actions' => ['logout'],
						'verbs'=>['POST'],
						'roles'=>['@']
					],
					
					[ //всем контроллерам доступ на индекс только зарегистрированным
						'allow' =>true,
						'actions' => ['index', 'view'],
						'roles'=>['@']
					],
					[ //всем контроллерам доступ на редактирование только зарегистрированным
						'allow' =>true,
						'actions' => ['update', 'create'],
						'roles'=>['@'],
						'matchCallback'=>function($rule, $action){
							return (Yii::$app->user->identity['role'] < 3);
						}
					],
					[ //всем контроллерам удалять записи запрещено
						'allow' => false,
						'actions' => ['delete'],
					],
					
					[ //тарифные зоны только чтение
						'allow' => true,
						'controllers' => ['areatype'],
						'actions' => ['index'],
						'roles' => ['@'],
					],
					
					[ //тарифные зоны только чтение
						'allow' => false,
						'controllers' => ['areatype'],
						'actions' => ['create', 'view', 'update'],
						'roles' => ['?', '@'],
					],

                    [ //удаленное изменение
                        'allow' => true,
                        'controllers' => ['remote'],
                        'actions' => ['set_latlng', 'get_latlng', 'get_street_list'],
                        'roles' => ['@'],
                    ],
				]
			]
		];
	}
}*/