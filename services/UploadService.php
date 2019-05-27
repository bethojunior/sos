<?php


class Upload {

    public function uploadFile($file , $title , $dir){

        try {
            $up = move_uploaded_file($file, $dir.$title);
            if($up){
                return true;
            }
            return false;

        }catch(Exception $e){
            return $e->getMessage();
        }

    }
}


