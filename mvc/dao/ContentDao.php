<?php


class ContentDao extends BaseDao
{
    public function insertContent($name , $value , $description , $ref){

        try{
            $query = "INSERT INTO products (name , value , description , ref) VALUES (:name , :value , :description , :ref)";
            $query = $this->conn->prepare($query);
            $query -> bindValue(':name'        , $name  , PDO::PARAM_STR);
            $query -> bindValue(':value'       , $value , PDO::PARAM_STR);
            $query -> bindValue(':ref'         , $ref , PDO::PARAM_STR);
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
            $query = "delete from products where id = :id";
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