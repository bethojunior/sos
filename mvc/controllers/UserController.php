<?php
/**
 * Created by PhpStorm.
 * User: Betho
 * Date: 16/03/2019
 * Time: 22:00
 */

class UserController extends BaseController
{
    public $log;

    public function actionAuthenticate(){
        $logC = new LogController();
        $login = $this->byPost['email'];
        $pass  = $this->byPost['password'];
        $userDao = new UserDao();
        $return = $userDao->getUser($login , $pass);
        $token = self::updateTokenUser($login , $pass ,base64_encode(rand(1 , 150)));

        if($return){
            if($token){
                //$logC->logHere($login , self::LEVEL_INFORMATION ,"Usuário logou");
                echo $token;
                return true;
            }
            echo $token;
        }
        echo $return;

    }

    public function actionInsertUser(){

        $token =  base64_encode(rand (1 , 150));
        $name     = $this->byPost['name'];
        $email    = $this->byPost['email'];
        $pass     = $this->byPost['pass'];
        $type     = $this->byPost['type'];

        if(!self::checkEmail($email)){
            $return = $this->userdao->insertUser($name , $email , $pass , $type, $token ,true);
            echo $return;
            return true;
        }

        echo ApiResponse::getResponse(false , "Email existe");
    }

    public function actionUpdateUser(){
        $name     = $this->byPost['name'];
        $email    = $this->byPost['email'];
        $pass     = $this->byPost['password'];
        $id       = $this->byPost['id'];

        if(!self::checkEmail($email)){
            $return = $this->userdao->updateUser($name , $email , $pass , $id);
            echo $return;
            return;
        }

        echo ApiResponse::getResponse(false , "Email existe");
    }

    public function actionDeleteUser(){
        echo $this->userdao->deleteUser($this->byPost['id']);
    }

    public function actionGetAll(){
        echo $this->baseDao->dbGetAll('users');
    }

    public function actionGetUserByType(){
        $type = $this->byPost;
        echo $this->userdao->getUserByType($type);
    }

    public function actionChangeStatusStudent(){
        $status = $this->byPost['status'];
        $email  = $this->byPost['email'];
        echo $this->userdao->updateStatusUser($email,$status);
    }

    static private function updateTokenUser($email , $pass ,  $token){
        $userDao = new UserDao();
        return $userDao->updateTokenUser($email , $pass ,$token);
    }

    static public function checkEmail($email){
        $userDao = new UserDao();
        $return = $userDao->checkEmail($email);
        return $return;
    }

}