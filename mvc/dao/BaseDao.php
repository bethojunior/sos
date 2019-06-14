<?php

class BaseDao{

    protected $conn;

    public function __construct(){
        try{
            $this->conn = Connection::open(Connection::DB_MYSQL);
        }catch(Exception $e){
            echo $e->getMessage();
        }
    }

    public function dbGetAll($table){
        try{
            $query = "SELECT * FROM {$table} ORDER BY id DESC";
            $query = $this->conn->prepare($query);
            $query->execute();
            $all = $query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() != 0){
                return ApiResponse::showResponse(true , 'Success' , $all);
            }

            return  ApiResponse::showResponse(false , "Error");

        }catch(PDOException $e){
            return ApiResponse::showResponse(false , $e->getMessage());
        }

    }
}