<?php

class UserDao extends BaseDao{

    protected $conn;


    public function getUserById($id){
        try{
            $query = "SELECT * FROM users where id = :id";
            $query = $this->conn->prepare($query);
            $query->bindValue(':id' , $id , PDO::PARAM_INT);
            $query->execute();
            $all = $query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() != 0){

                ApiResponse::showResponse(true , 'find client' , $all);
                return;
            }
            ApiResponse::showResponse(false , 'Dados não conferem' , $all);
            return;

        }catch(PDOException $e){
            ApiResponse::showResponse(false , $e->getMessage() , $all);
            return;
        }
    }

    public function getUserByEmail($email){
        try{
            $query = "SELECT * FROM users where email = :email";
            $query = $this->conn->prepare($query);
            $query->bindValue(':email' , $email , PDO::PARAM_STR);
            $query->execute();
            $all = $query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() != 0){

                ApiResponse::showResponse(true , 'find client' , $all);
                return;
            }
            ApiResponse::showResponse(false , 'Dados não conferem' , $all);
            return;

        }catch(PDOException $e){
            ApiResponse::showResponse(false , $e->getMessage() , $all);
            return;
        }
    }

    public function getUser($email , $password){
        try{
            $query = "SELECT * FROM users where email = :email AND password = :password";
            $query = $this->conn->prepare($query);
            $query->bindValue(':email' , $email , PDO::PARAM_STR);
            $query->bindValue(':password' ,  $password ,  PDO::PARAM_STR);
            $query->execute();
            $all = $query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() != 0){

                return ApiResponse::getResponse(true , 'find client' , $all);
            }
            return ApiResponse::getResponse(false , 'Dados não conferem' , $all);


        }catch(PDOException $e){
            return ApiResponse::getResponse(false , $e->getMessage() , $all);
        }
    }


    public function insertUser($name , $email , $pass , $type, $token , $status){

        try{
            $query = "INSERT INTO users (name , email , password , token , status ,type) VALUES (:name , :email , :pass , :token , :status , :type)";
            $query = $this->conn->prepare($query);
            $query -> bindValue(':name'   , $name  , PDO::PARAM_STR);
            $query -> bindValue(':email'  , $email , PDO::PARAM_STR);
            $query -> bindValue(':pass'   , $pass  , PDO::PARAM_STR);
            $query -> bindValue(':token'  , $token , PDO::PARAM_STR);
            $query -> bindValue(':status' , $status, PDO::PARAM_STR);
            $query -> bindValue(':type'   , $type  , PDO::PARAM_STR);
            $query->execute();

            if($query){
                return ApiResponse::getResponse(true , "User entred");
            }

            return ApiResponse::getResponse(false,  $query);

        }catch(Exception $e){
            return ApiResponse::getResponse(false , $e->getMessage());
        }

    }

    public function deleteUser($id){

        try{
            $query = "delete from users where id = :id";
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

    public function checkEmail($email){
        try{
            $query = "SELECT * FROM users where email = :email";
            $query = $this->conn->prepare($query);
            $query->bindValue(':email' , $email , PDO::PARAM_STR);
            $query->execute();

            if($query->rowCount() != 0){
                return true;
            }
            return false;

        }catch(PDOException $e){
            return $e->getMessage();
        }
    }



    public function checkUser($id){
        try{
            $query = "SELECT id FROM users where id = :id";
            $query = $this->conn->prepare($query);
            $query->bindValue(':id' , $id , PDO::PARAM_INT);
            $query->execute();
            $all = $query->fetchAll();

            if($query->rowCount() != 0){
                return $all;
            }

            return false;


        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function updateTokenUser($email , $pass ,  $token){
        try{
            $query = "UPDATE users set token = :token where email = :email";
            $query = $this->conn->prepare($query);
            $query->bindValue(':email'    , $email , PDO::PARAM_STR);
            $query->bindValue(':token' , $token , PDO::PARAM_STR);
            $query->execute();

            if($query->rowCount() != 0){
                return $this->getUser($email , $pass);
            }

            return false;


        }catch(PDOException $e){
            return false;
        }
    }

    public function updateStatusUser($email , $status){
        try{
            $query = "UPDATE users set status = :status where email = :email";
            $query = $this->conn->prepare($query);
            $query->bindValue(':email'    , $email , PDO::PARAM_STR);
            $query->bindValue(':status' , $status , PDO::PARAM_STR);
            $query->execute();

            if($query->rowCount() != 0){
                return $this->getUserByEmail($email);
            }

            return false;


        }catch(PDOException $e){
            return false;
        }
    }

    public function updateUser($name , $email , $password , $id){
        try{
            $query = "UPDATE users set name = :name , email = :email , password = :password where id = :id";
            $query = $this->conn->prepare($query);
            $query->bindValue(':id'       , $id       , PDO::PARAM_INT);
            $query->bindValue(':email'    , $email    , PDO::PARAM_STR);
            $query->bindValue(':name'     , $name     , PDO::PARAM_STR);
            $query->bindValue(':password' , $password , PDO::PARAM_STR);
            $query->execute();

            if($query->rowCount() != 0){
                return $this->getUserByEmail($email);
            }

            return false;


        }catch(PDOException $e){
            return $e->getMessage();
        }
    }

    public function getUserByType($type){
        try{
            $query = "SELECT * FROM users where type = :type";
            $query = $this->conn->prepare($query);
            $query->bindValue(':type' , $type , PDO::PARAM_STR);
            $query->execute();
            $all = $query->fetchAll(PDO::FETCH_OBJ);

            if($query->rowCount() != 0){
                return ApiResponse::getResponse(true , 'find client' , $all);
            }
            return ApiResponse::getResponse(false , 'Dados não conferem' , $all);


        }catch(PDOException $e){
            return ApiResponse::getResponse(false , $e->getMessage() , $all);
        }
    }


}