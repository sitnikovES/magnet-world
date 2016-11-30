<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 29.11.2016
 * Time: 11:34
 */

namespace app\srv;

class Image {
    static private function getImageInfo($filename){
        if(file_exists($filename)){
            if($tmp = getimagesize($filename)){
                $result = array();
                $result['width'] = $tmp[0];
                $result['height'] = $tmp[1];
                //$result['channels'] = $tmp['channels'];
                $result['bits'] = $tmp['bits'];
                $result['mime'] = $tmp['mime'];
                return $result;
            }
            return false;
        }
        else {
            return false;
        }
    }

    static public function setWidth($filename, $width){
        $fileinfo = self::getImageInfo($filename);
        if(!is_array($fileinfo)){
            return false;
        }
        
        $fl = explode('.', basename($filename));

        //Получили новые размеры
        $height = round($width * $fileinfo['height'] / $fileinfo['width']);

        $func = 'imagecreatefrom' . explode('/', $fileinfo['mime'])[1];
        $new_image = imagecreatetruecolor($width, $height);
        $cur_image = $func($filename);

        imagecopyresampled($new_image, $cur_image, 0, 0, 0, 0, $width, $height, $fileinfo['width'], $fileinfo['height']);
        $func = 'image' . explode('/', $fileinfo['mime'])[1];
        return $func($new_image, dirname($filename) . '/' . $fl[0] . '_' . $width . 'x' . $height . '.' . $fl[1]);
    }

    static public function setHeight($filename, $height){
        $fileinfo = self::getImageInfo($filename);
        if(!is_array($fileinfo)){
            return false;
        }
        
        $fl = explode('.', basename($filename));
        
        //Получили новые размеры
        $width = round($height * $fileinfo['width'] / $fileinfo['height']);

        $func = 'imagecreatefrom' . explode('/', $fileinfo['mime'])[1];
        $new_image = imagecreatetruecolor($width, $height);
        $cur_image = $func($filename);

        imagecopyresampled($new_image, $cur_image, 0, 0, 0, 0, $width, $height, $fileinfo['width'], $fileinfo['height']);
        $func = 'image' . explode('/', $fileinfo['mime'])[1];
        return $func($new_image, dirname($filename) . '/' . $fl[0] . '_' . $width . 'x' . $height . '.' . $fl[1]);

    }

    static public function crop($filename, $width, $height){
        $fileinfo = self::getImageInfo($filename);
        if(!is_array($fileinfo)){
            return false;
        }
        $fl = explode('.', basename($filename));

        $f2 = $width / $height;
        $f1 = $fileinfo['width'] / $fileinfo['height'];

        if($f2 > $f1){
            $x_offset = 0;
            $y_offset = ($fileinfo['height'] - ($fileinfo['width'] / $f2)) / 2;
        }
        else {
            $y_offset = 0;
            $x_offset = ($fileinfo['width'] - ($fileinfo['height'] * $f2)) / 2;
        }

        $func = 'imagecreatefrom' . explode('/', $fileinfo['mime'])[1];
        $new_image = imagecreatetruecolor($width, $height);
        $cur_image = $func($filename);

        imagecopyresampled(
            $new_image,
            $cur_image,
            0,
            0,
            $x_offset, $y_offset,
            $width,
            $height,
            $fileinfo['width'] - $x_offset * 2,
            $fileinfo['height'] - $y_offset * 2);
        $func = 'image' . explode('/', $fileinfo['mime'])[1];
        $func($new_image, dirname($filename) . '/' . $fl[0] . '_' . $width . 'x' . $height . '.' . $fl[1]);
        return dirname($filename) . '/' . $fl[0] . '_' . $width . 'x' . $height . '.' . $fl[1];
    }
}