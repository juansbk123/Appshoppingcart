<?php 
  include('../../models/user.php');
  session_start();
  
  if(empty($_SESSION['login']) || !$_SESSION['userData']['rol'] == "Administrador"){
    header('Location:../client/login.php');
  }

  $new_user = new User();
  $res = "";

  if($_POST){
    if(empty($_POST['nombre']) || empty($_POST['apellidos'] ) || empty($_POST['email'])  || empty($_POST['contraseña']) || empty($_POST['fecha_nac'])|| empty($_POST['rol'])) {            
      $res = "datos invalidos";
    }
    else {
      $nombre = $_POST['nombre'];
      $apellidos = $_POST['apellidos'];
      $email = $_POST['email'];
      $contraseña = $_POST['contraseña'];
      $fechanac = $_POST['fecha_nac'];
      $rol = $_POST['rol'];
      $res_query = $new_user->createUser($nombre,$apellidos,$fechanac,$email,$contraseña,$rol);
      if($res_query){
        $res = "Se inserto correctamente";
      }
    }
  }

?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Twitter meta-->
    <title>Añadir Clientes</title>
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
          <h1><i class="fa fa-dashboard"></i> Usuarios</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Usuario</li>
          <li class="breadcrumb-item"><a href="#">Añadir usuario</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Añadir usuario</h3>
            <form action="" method="POST">
            <div class="tile-body">
                <div class="row">
                  <div class="col-lg-5">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input class="form-control form-control-lg" type="text" name="nombre">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input class="form-control form-control-lg" type="email" aria-describedby="emailHelp" name="email" autocomplete="new-password">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Fecha de nacimiento</label>
                        <input class="form-control form-control-lg" id="demoDate" type="text" name="fecha_nac">                     
                      </div>
                  </div>
                  <div class="col-lg-5 offset-lg-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Apellidos</label>
                        <input class="form-control form-control-lg" type="text" aria-describedby="emailHelp" name="apellidos">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control form-control-lg" id="exampleInputPassword1" type="password" autocomplete="new-password" name="contraseña">
                      </div>
                      <div class="form-group">
                        <label for="exampleSelect1">Rol</label>
                        <select class="form-control form-control-lg" id="exampleSelect1" name="rol">
                        <option value="cliente">Cliente</option>
                        <option value="administrador">Administrador</option>
                        </select>
                      </div>
                  </div>
                </div>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
            </div>
            </form>
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
    <script>    
      $('#demoDate').datepicker({
      	format: "yyyy-mm-dd",
      	autoclose: true,
      	todayHighlight: true
      }); 
    </script>
    <!-- Google analytics script-->
    <script type="text/javascript">
      if(document.location.hostname == 'pratikborsadiya.in') {
      	(function(i,s,o,g,r,a,m){i['GoogleAnalyticsObject']=r;i[r]=i[r]||function(){
      	(i[r].q=i[r].q||[]).push(arguments)},i[r].l=1*new Date();a=s.createElement(o),
      	m=s.getElementsByTagName(o)[0];a.async=1;a.src=g;m.parentNode.insertBefore(a,m)
      	})(window,document,'script','//www.google-analytics.com/analytics.js','ga');
      	ga('create', 'UA-72504830-1', 'auto');
      	ga('send', 'pageview');
      }
    </script>
  </body>
</html>