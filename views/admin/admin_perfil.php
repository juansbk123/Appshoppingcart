<?php 
session_start();

if(empty($_SESSION['login']) || !$_SESSION['userData']['rol'] == "Administrador"){
  header('Location:../client/login.php');
}

include('../../models/user.php');
$user = new User();
$res = "";

if($_POST) {
  if(empty($_POST['txtemail']) || empty($_POST['txtlastname']) || empty($_POST['txtname']) || empty($_POST['txtpass']) || empty($_POST['txtfecnac'])) {
      $res = "datos invalidos";
  }
  else {
      $name = $_POST['txtname'];
      $email = $_POST['txtemail'];
      $lastname = $_POST['txtlastname'];
      $pass = $_POST['txtpass'];
      $birthdate = $_POST['txtfecnac'];
      $id = $_SESSION['iduser'];
      $requser_1= $user->updateUser($id,$name,$lastname,$birthdate,$email);
      $requser_2 = $user->updatePass($id,$pass);
      if($requser_1 > 0 && $requser_2 > 0) {
          $res = "Datos guardados correctamente";
          $arrData = $user->sessionLogin($_SESSION['iduser']);
          $_SESSION['userData'] = $arrData;
      }
      else {
          $res = "Error al actualizar";
      }
  } 
}

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Twitter meta-->
    <title>Dashboard</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="http://localhost/IngWeb/project/assets/css/main.css">
    <!-- Font-icon css-->
    <link rel="stylesheet" type="text/css" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
  </head>
  <body class="app sidebar-mini">
    <!-- Navbar-->
    <?php include("header_admin.php"); ?>
    <!-- Sidebar menu-->
    <?php include("nav_admin.php"); ?>
    <main class="app-content">
      <div class="app-title">
        <div>
          <h1>Mi cuenta</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Mis datos</li>
        </ul>
      </div>
      <div class="row user">
      <div class="col-md-9">
          <div class="tab-content">
            <div class="tab-pane active" id="user-settings">
              <div class="tile user-settings">
                <h4 class="line-head">Datos Personales</h4>
                <form method="post" action="" id="form-login">
                  <div class="row mb-4">
                    <div class="col-md-5">
                      <label>Nombre</label>
                      <input class="form-control" type="text" value="<?php echo $_SESSION['userData']['nombre'] ?>" name="txtname">
                    </div>
                    <div class="col-md-5">
                      <label>Apellido</label>
                      <input class="form-control" type="text" value="<?php echo $_SESSION['userData']['apellidos'] ?>" name="txtlastname">
                    </div>
                  </div>
                  <div class="row">
                    <div class="col-md-10 mb-4">
                      <label>Email</label>
                      <input class="form-control" type="email" value="<?php echo $_SESSION['userData']['email'] ?>" name="txtemail" id="email">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-10 mb-4">
                      <label>Contraseña</label>
                      <input class="form-control" type="password" value="<?php echo $_SESSION['userData']['contraseña'] ?>" name="txtpass">
                    </div>
                    <div class="clearfix"></div>
                    <div class="col-md-10 mb-4">
                      <label>Fecha de nacimiento</label>
                      <input class="form-control" type="text" value="<?php echo $_SESSION['userData']['fecha_nac'] ?>" name="txtfecnac" id="demoDate">
                    </div>
                  </div>
                  <div class="row mb-10">
                    <div class="col-md-12">
                      <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i> Guardar</button>
                    </div>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
        <div class="col-md-3">
          <div class="profile">
            <div class="info"><img class="user-img" src="https://censur.es/wp-content/uploads/2019/03/default-avatar.png">
              <h4><?php echo $_SESSION['userData']['nombre'] ." ". $_SESSION['userData']['apellidos'] ?></h4>
              <p><?php echo $_SESSION['userData']['rol']?></p>
            </div>
          </div>
        </div>
      </div>
    </main>

    <!-- Essential javascripts for application to work-->
    <script src="http://localhost/IngWeb/project/assets/js/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/IngWeb/project/assets/js/popper.min.js"></script>
    <script src="http://localhost/IngWeb/project/assets/js/bootstrap.min.js"></script>
    <script src="http://localhost/IngWeb/project/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="http://localhost/IngWeb/project/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <script type="text/javascript" src="http://localhost/IngWeb/project/assets/js/plugins/bootstrap-datepicker.min.js"></script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      $('#demoDate').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      });
      function emailIsValid (email) {
            return /\S+@\S+\.\S+/.test(email)  
        }
      const form = document.getElementById('form-login');
        form.addEventListener('submit',(e)=>{
            e.preventDefault();
            if (emailIsValid(document.getElementById('email').value)) form.submit();
            else alert('Email invalido');
        })
    </script>
  </body>
</html>