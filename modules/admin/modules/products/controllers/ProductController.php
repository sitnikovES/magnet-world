<?php

namespace app\modules\admin\modules\products\controllers;

use Yii;
use app\models\Product;
use app\models\ProductSearch;
use yii\helpers\Json;
use yii\web\NotFoundHttpException;
use yii\web\UploadedFile;
use app\models\ProductPhoto;
use app\srv\Image;
use app\models\Imagesize;

//use yii\web\Controller;
//use yii\filters\VerbFilter;
//use app\modules\admin\models\UploadForm;

/**
 * ProductController implements the CRUD actions for Product model.
 */
class ProductController extends BehaviorsController
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
     * Lists all Product models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new ProductSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Product model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new Product model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */

    public function saveFile($model){
        if(!file_exists(Yii::getAlias('@webroot') . '/img/product')){
            mkdir(Yii::getAlias('@webroot') . '/img/product');
        }

        if(!file_exists(Yii::getAlias('@webroot') . '/img/product/' . $model->id)){
            mkdir(Yii::getAlias('@webroot') . '/img/product/' . $model->id);
        }

        $filename = 'id_' . $model->id . '.' . $model->file->extension;
        $model->file->saveAs(Yii::getAlias('@webroot') . '/img/product/' . $model->id . '/' . $filename);
        $file_icon = $filename;
        $images = Imagesize::find()->where(['some_id' => $model->product_type_id ])->orderBy('height')->asArray()->all();
        if(count($images)){
            $i = false;
            foreach ($images as $image){
                if(!$i){
                    $i = true;
                    $file_icon = basename(
                        Image::crop(Yii::getAlias('@webroot') . '/img/product/' . $model->id . '/' . $filename,
                        $image['width'],
                        $image['height']));
                }
                else {
                    Image::crop(
                        Yii::getAlias('@webroot') . '/img/product/' . $model->id . '/' . $filename,
                        $image['width'],
                        $image['height']);
                }
            }
        }


        //$file_icon = basename(Image::crop(Yii::getAlias('@webroot') . '/img/product/' . $model->id . '/' . $filename, 350, 350));


        Product::updateAll(['image' => $file_icon], 'id = ' . $model->id);
    }

    public function actionCreate()
    {
        $model = new Product();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            if(!file_exists(Yii::getAlias('@webroot') . '/img/product')){
                mkdir(Yii::getAlias('@webroot') . '/img/product');
            }
            if(!file_exists(Yii::getAlias('@webroot') . '/img/product/' . $model->id)){
                mkdir(Yii::getAlias('@webroot') . '/img/product/' . $model->id);
            }

            //return $this->redirect(['view', 'id' => $model->id]);
            return $this->redirect(['update', 'id' => $model->id]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Product model.
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

    public function actionUpload($id){
        $filename = 'file';
        $uploadPath = Yii::getAlias('@webroot') . '/img/product/' . $id . '/';
        if(!file_exists($uploadPath)){
            mkdir($uploadPath);
        }
        $uploadPath .= 'demo/';
        if(!file_exists($uploadPath)){
            mkdir($uploadPath);
        }
        if(isset($_FILES[$filename])){
            $file = UploadedFile::getInstanceByName($filename);

            if($file->saveAs($uploadPath . $file->name)){
                $photo = new ProductPhoto();
                $photo->filename = $file->name;
                $photo->product_id = $id;
                $photo->save();
                echo Json::encode($file);
            }
        }
        return false;
    }

    /*public function actionImageload(){
        $model = new UploadForm();

        if(Yii::$app->request->isPost){
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if($model->upload()){
                print_r($_POST);
                return;
            }
        }

        if(Yii::$app->request->isAjax){
            $model->imageFiles = UploadedFile::getInstances($model, 'imageFiles');
            if($model->upload()){
                return;
            }
        }
        return $this->render('imageload', ['model' => $model]);
    }*/

    /**
     * Deletes an existing Product model.
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
     * Finds the Product model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return Product the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = Product::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
