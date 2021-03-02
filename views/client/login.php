<?php
    include('../../models/user.php');
    session_start();
    $user = new User();
    $res="";
    if($_POST) {
        if(empty($_POST['txtemail']) || empty($_POST['txtpass'])) {
            $res = "datos invalidos";
        } 
        else {
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            // $pass = hash('sha256',$_POST['txtpass']);
            $requser = $user->loginUser($email,$pass);
            if(empty($requser)){
                $res = "Usuario no encontrado";
            } 
            else {
                $data = $requser;
                $_SESSION['iduser'] = $data['id'];
                $_SESSION['login'] = true;
                $arrData = $user->sessionLogin($_SESSION['iduser']);
                $_SESSION['userData'] = $arrData;
                header(($_SESSION['userData']['rol'] == 'Administrador') ? "Location:../admin/dashboard.php" : "Location:home.php");
                exit();
            }
        }
    }
?>



<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar sesion</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="sign-in-wrapper">
        <div class="login-brand text-center">
            <a href="home.php">Tech Shop</a>
        </div>
        <div class="sign-in-inner">
            <form class="login" method="post" action="">
                <h2 class="text-center">Iniciar sesión</h2>
                <div class="form-group m-bottom-md">
                    <label for="username">Email</label>
                    <div class="form-input">
                        <input type="text" class="form-control" id="username" name="txtemail">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div class="form-group">
                    <label for="password">Contraseña</label>
                    <div class="form-input">
                        <input type="password" class="form-control" id="password" name="txtpass">
                        <i class="fa fa-exclamation-triangle"></i>
                    </div>
                </div>
                <div class="m-top-1 p-top-sm">
                    <button class="btn login-btn" name="login" type="submit">Acceder</button>
                </div>
                <div class="m-top-2 p-top-sm">
                    <div class="font-14 text-center m-bottom-xs">
                        <p>¿No tienes cuenta? <a href="register.php">Registrate</a></p>
                    </div>
                </div>
            </form>
        </div>
        <span><?php if(isset($res)) echo $res?></span>
    </div>
</body>
</html>