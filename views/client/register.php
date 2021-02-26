<?php
    include('../../models/user.php');
    session_start();
    $user = new User();
    $res = "";
    if($_POST) {
        if(empty($_POST['txtemail']) || empty($_POST['txtpass']) || empty($_POST['txtname'])) {
            $res = "datos invalidos";
        }
        else {
            $name = $_POST['txtname'];
            $email = $_POST['txtemail'];
            $pass = $_POST['txtpass'];
            $requser = $user->registerUser($name,$email,$pass);
            if($requser != 0) {
                $data = $requser;
                $_SESSION['iduser'] = $data;
                $_SESSION['login'] = true;
                $arrData = $user->sessionLogin($_SESSION['iduser']);
                $_SESSION['userData'] = $arrData;
                header("Location:home.php");
                exit;
            }
            else {
                $res = "Error al insertar";
            }
        } 
    }
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrate</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <div class="sign-in-wrapper">
        <div class="login-brand text-center">
            <a href="home.php">Tech Shop</a>
        </div>
        <div class="sign-in-inner">
            <form class="login" method="post" action="" id="form-login" name="formlogin">
                <h2 class="text-center">Regístrate</h2>
                    <div class="form-group m-bottom-md">
                        <label for="username">Nombre</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="username" name="txtname" autofocus>
                        </div>
                    </div>
                    <div class="form-group m-bottom-md">
                        <label for="username">Email</label>
                        <div class="form-input">
                            <input type="text" class="form-control" id="email" name="txtemail">
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
                    <button class="btn login-btn" name="login" type="button" id="login">Registrarse</button>
                </div>
                <div class="m-top-2 p-top-sm">
                    <div class="font-14 text-center m-bottom-xs">
                        <p>¿Ya tienes cuenta? <a href="login.php">Inicia sesion</a></p>
                    </div>
                </div>
            </form>
        </div>
        <span><?php if(isset($res)) echo $res?></span>
    </div>
    <script>
        function emailIsValid (email) {
            return /\S+@\S+\.\S+/.test(email)  
        }
        const form = document.getElementById('form-login');
        form.addEventListener('submit',(e)=>{
            e.preventDefault();
            if (emailIsValid(document.getElementById('email').value)) form.submit();
            else alert('Email invalido');
        })

        form.addEventListener('keydown',(e)=>{
            if(e.keyCode == "13" || e.keyCode == "40"){
                if (e.target.id != "password") e.target.parentNode.parentNode.nextElementSibling.querySelector('input').focus();
                else document.formlogin.submit();
            }
            else if(e.keyCode == "38"){
                e.target.parentNode.parentNode.previousElementSibling.querySelector('input').focus();
            }
        });
    </script>
</body>
</html>