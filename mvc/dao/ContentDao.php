<?php


class ContentDao extends BaseDao
{
    public function insertContent($name , $title , $description , $data , $isvideo){

        try{
            $query = "INSERT INTO files (name , title , description , datenow ,isvideo) VALUES (:name , :title , :description, :data , :isvideo)";
            $query = $this->conn->prepare($query);
            $query -> bindValue(':name' , $name , PDO::PARAM_STR);
            $query -> bindValue(':title' , $title , PDO::PARAM_STR);
            $query -> bindValue(':data' , $data , PDO::PARAM_STR);
            $query -> bindValue(':isvideo' , $isvideo , PDO::PARAM_STR);
            $query -> bindValue(':description' , $description , PDO::PARAM_STR);
            $query->execute();

            if($query){
                return ApiResponse::getResponse(true , "Inserido");
            }

            return ApiResponse::getResponse(false,  $query);

        }catch(Exception $e){
            return ApiResponse::getResponse(false , $e->getMessage());
        }

    }


    public function deleteContent($id){

        try{
            $query = "delete from files where id = :id";
            $query = $this->conn->prepare($query);
            $query -> bindValue(':id' , $id , PDO::PARAM_INT);
            $query->execute();

            if($query){
                return ApiResponse::getResponse(true , "Deletado");
            }

            return ApiResponse::getResponse(false,  $query);

        }catch(Exception $e){
            return ApiResponse::getResponse(false , $e->getMessage());
        }

    }
}