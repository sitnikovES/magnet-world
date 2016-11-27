<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 25.11.2016
 * Time: 10:42
 */
namespace app\srv;


use app\models\Geocidroptim;
use app\models\Producttype;

class Servdata {
    static function getGeo(){
        $arr = explode('.', $_SERVER['REMOTE_ADDR']);
        $num = $arr[0] * 256 * 256 * 256 + $arr[1] * 256 * 256 + $arr[2] * 256 + $arr[3];

        $geo = Geocidroptim::find()
            ->where(['<=', 'block_begin', $num])
            ->andWhere(['>=', 'block_end', $num])
            ->with('city')
            ->asArray()
            ->limit(1)
            ->one();
        if(empty($geo)){
            $geo = 'Не определено (' . $_SERVER['REMOTE_ADDR'] . ')';
        }
        else {
            $geo = $geo['city']['region'] . ' - ' . $geo['city']['name'];
        }
        return $geo;
    }

    static function leftMenu(){
        return Producttype::find()->where(['active' => 1])->with('themes')->orderBy(['pos' => 'SORT_ASK', 'NAME' => 'SORT_ASK'])->asArray()->all();
    }
} 