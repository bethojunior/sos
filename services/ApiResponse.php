<?php
/**
 * Created by PhpStorm.
 * User: hgome
 * Date: 26/11/2018
 * Time: 14:42
 */

class ApiResponse
{
    public static function getResponse($bool , $message , $data = null){
        if($bool)
            return json_encode(['status' => true , 'message' => $message , 'data' => $data]);
        return json_encode(['status' => false , 'message' => $message , 'data' => $data]);
    }

    public static function showResponse($bool , $message , $data = null){
        if($bool){
            echo json_encode(['status' => true , 'message' => $message , 'data' => $data]);
            return;
        }
        echo json_encode(['status' => false , 'message' => $message , 'data' => $data]);
    }
}