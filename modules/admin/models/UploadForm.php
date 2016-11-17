<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 17.11.2016
 * Time: 12:20
 */

namespace app\modules\admin\models;


use yii\base\Model;
use yii\web\UploadedFile;

class UploadForm extends Model {

    /**
     * @var UploadedFile[]
     */
    public $imageFiles;

    public function rules(){
        return [
            [['imageFiles'], 'file', 'skipOnEmpty' => false, 'extensions' => 'png, jpg', 'maxFiles' => 4],
        ];
    }

    public function upload(){
        if($this->validate()){
            foreach($this->imageFiles as $file) {
                $file->saveAs(\Yii::getAlias('@webroot') . '/uploads/' . $file->baseName . '.' . $file->extension);
            }
            return true;
        }
        else {
            return false;
        }
    }
} 