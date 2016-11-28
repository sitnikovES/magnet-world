<?php

namespace app\modules\admin\modules\products\controllers;

use Yii;
use app\models\Productthema;
use app\models\ProductthemaSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;

/**
 * ProductthemaController implements the CRUD actions for Productthema model.
 */
class ProductthemaController extends BehaviorsController
{
    /**
     * @inheritdoc
     */
    /*public function behaviors()
    {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }*/

    /**
     * Lists all Productthema models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductthemaSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Productthema model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    public function saveFile($model){
        if(!file_exists(Yii::getAlias('@webroot') . '/img/productthema')){
            mkdir(Yii::getAlias('@webroot') . '/img/productthema');
        }
        $filename = 'id_' . $model->id . '.' . $model->file->extension;
        $model->file->saveAs(Yii::getAlias('@webroot') . '/img/productthema/' . $filename);
        Productthema::updateAll(['file_icon' => $filename], 'id = ' . $model->id);
    }

    /**
     * Creates a new Productthema model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new Productthema();
        if ($model->load(Yii::$app->request->post())) {
            if($model->save()){
                //Сохранения файла
                $model->file = UploadedFile::getInstance($model, 'file');
                if($model->file){
                    $this->saveFile($model);
                }
                return $this->redirect(['view', 'id' => $model->id]);
            }
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Productthema model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            $model->file = UploadedFile::getInstance($model, 'file');
            if($model->file){
                $this->saveFile($model);
            }
            return $this->redirect(['view', 'id' => $model->id]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Productthema model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Productthema model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Productthema the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Productthema::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
