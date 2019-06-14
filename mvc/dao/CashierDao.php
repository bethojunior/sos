<?php


class CashierDao extends BaseDao
{
    public function insert($id_who , $what , $value_sale , $name){

        try{
            $query = "INSERT INTO caixa (what , id_who , value_sale , name) VALUES (:what , :id_who , :value_sale , :name)";
            $query = $this->conn->prepare($query);
            $query -> bindValue(':what'        , $what  ,   PDO::PARAM_STR);
            $query -> bindValue(':id_who'      ,$id_who ,   PDO::PARAM_STR);
            $query -> bindValue(':value_sale'  ,$value_sale,PDO::PARAM_STR);
//            $query -> bindValue(':data_who'    ,$data,      PDO::PARAM_STR);
            $query -> bindValue(':name'        ,$name,      PDO::PARAM_STR);
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
            $query = "delete caixa products where id = :id";
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

    public function getById($id){
        try{
            $query = "SELECT * FROM caixa where id = :id";
            $query = $this->conn->prepare($query);
            $query->bindValue(':id' , $id , PDO::PARAM_INT);
            $query->execute();
            $all = $query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() != 0){

                ApiResponse::showResponse(true , 'find' , $all);
                return;
            }
            ApiResponse::showResponse(false , 'Erro' , $all);
            return;

        }catch(PDOException $e){
            ApiResponse::showResponse(false , $e->getMessage() , $all);
            return;
        }
    }


    public function getMonthValue($who){
        try{
            $query = "SELECT SUM(value_sale) AS total FROM caixa WHERE DATE_FORMAT(data_who, '%Y/%m') = '$who'";
            $query = $this->conn->prepare($query);
            $query->execute();
            $all = $query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() != 0){

                ApiResponse::showResponse(true , 'find' , $all);
                return;
            }
            ApiResponse::showResponse(false , 'Erro' , $all);
            return;

        }catch(PDOException $e){
            ApiResponse::showResponse(false , $e->getMessage() , $all);
            return;
        }
    }




}