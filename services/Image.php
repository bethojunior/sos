<?php

/**
 * Created by PhpStorm.
 * User: Betho Junior
 * Date: 18/04/2018
 * Time: 20:27
 */
class Image{

    public static function setNameImage($file , $address , $bool){

        $nameArray = explode(".",$file['name']);
        $date = date('d-m-y-H-i-s');
        $ext = end($nameArray);
        $title = ($date.".".$ext);

        $upload = new Upload();
        $returnUp = $upload->uploadFile($file['tmp_name'] , $title , '../config/files/'.$address.'/' , $bool);

        if($returnUp){
            return $title;
        }else {
            return false;
        }
    }

}