<?php

class Login extends Controllers {
    public function __construct() {
        session_start();
        parent::__construct();
    }

    public function loginUser() {
        if($_POST) {
            if(empty($_POST['txtemail']) || empty($_POST['txtpass'])) {
                $res = "datos invalidos";
            } 
            else {
                $email = $_POST['txtemail'];
                $pass = $_POST['txtpass'];
                // $pass = hash('sha256',$_POST['txtpass']);
                $requser = $this->model->loginUser($email,$pass);
                if(empty($requser)){
                    $res = "Usuario no encontrado";
                } 
                else {
                    $data = $requser;
                    $_SESSION['iduser'] = $data['id'];
                    $_SESSION['login'] = true;
                    header("Location:index.php");
                    exit;
                }
            }
            echo $res;
        }
        die();
    }
}
?>