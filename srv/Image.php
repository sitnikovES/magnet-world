<?php
/**
 * Created by PhpStorm.
 * User: es.sitnikov
 * Date: 29.11.2016
 * Time: 11:34
 */

namespace app\srv;

use Yii;


class Image {
    public $_filename;
    private $_width;
    private $_height;
    private $_type;
    private $_channels;
    private $_bits;

    public function __construct($filename){
        if(file_exists($filename)){
            $this->_filename = $filename;
            if($tmp = getimagesize($filename)){
                $this->_width = $tmp[0];
                $this->_height = $tmp[1];
                $this->_channels = $tmp['channels'];
                $this->_bits = $tmp['bits'];
                $this->_type = $tmp['mime'];
                print_r($tmp);
                return true;
            }
            return false;
        }
        else {
            return false;
        }
    }

    public function setMinSize($minSize){
        $fl = explode('.', basename($this->_filename));

        $height = $minSize;
        $width = $minSize;

        //Получили новые размеры
        if($this->_width > $this->_height){
            $width = round($minSize * $this->_width / $this->_height);
        }
        else {
            $height = round($minSize * $this->_height / $this->_width);
        }

        $func = 'imagecreatefrom' . explode('/', $this->_type)[1];
        $new_image = imagecreatetruecolor($width, $height);
        $cur_image = $func($this->_filename);

        imagecopyresampled($new_image, $cur_image, 0, 0, 0, 0, $width, $height, $this->_width, $this->_height);
        $func = 'image' . explode('/', $this->_type)[1];
        return $func($new_image, Yii::getAlias('@webroot') . '/img/' . $fl[0] . '_' . $width . 'x' . $height . '.' . $fl[1]);

    }

    public function crop($width, $height){
        $fl = explode('.', basename($this->_filename));

        $s_new = $width / $height;
        $s_cur = $this->_width / $this->_height;

        $func = 'imagecreatefrom' . explode('/', $this->_type)[1];
        $new_image = imagecreatetruecolor($width, $height);
        $cur_image = $func($this->_filename);

        /*$x = $width;
        $y = $height;
        if($this->_width > $this->_height){
            $width = round($minSize * $this->_width / $this->_height);
        }
        else {
            $height = round($minSize * $this->_height / $this->_width);
        }*/



        imagecopyresampled($new_image, $cur_image, 0, 0, 0, 0, $width, $height, $this->_width, $this->_height);
        $func = 'image' . explode('/', $this->_type)[1];
        return $func($new_image, Yii::getAlias('@webroot') . '/img/' . $fl[0] . '_' . $width . 'x' . $height . '.' . $fl[1]);
    }

    public function cropz($file_input, $file_output, $crop = 'square',$percent = false){
        list($w_i, $h_i, $type) = getimagesize($file_input);
        if (!$w_i || !$h_i) {
            echo 'Невозможно получить длину и ширину изображения';
            return;
        }
        $types = array('','gif','jpeg','png');
        $ext = $types[$type];
        if ($ext) {
            $func = 'imagecreatefrom'.$ext;
            $img = $func($file_input);
        } else {
            echo 'Некорректный формат файла';
            return;
        }
        if ($crop == 'square') {
            $min = $w_i;
            if ($w_i > $h_i) $min = $h_i;
            $w_o = $h_o = $min;
        } else {
            list($x_o, $y_o, $w_o, $h_o) = $crop;
            if ($percent) {
                $w_o *= $w_i / 100;
                $h_o *= $h_i / 100;
                $x_o *= $w_i / 100;
                $y_o *= $h_i / 100;
            }
            if ($w_o < 0) $w_o += $w_i;
            $w_o -= $x_o;
            if ($h_o < 0) $h_o += $h_i;
            $h_o -= $y_o;
        }
        $img_o = imagecreatetruecolor($w_o, $h_o);
        imagecopy($img_o, $img, 0, 0, $x_o, $y_o, $w_o, $h_o);
        if ($type == 2) {
            return imagejpeg($img_o,$file_output,100);
        } else {
            $func = 'image'.$ext;
            return $func($img_o,$file_output);
        }
    }
} 