<?php session_start();?>
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
            <div class="tile-body">
                <div class="row">
                  <div class="col-lg-5">
                    <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input class="form-control form-control-lg" id="exampleInputEmail1" type="email" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input class="form-control form-control-lg" id="exampleInputEmail1" type="email" aria-describedby="emailHelp">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Fecha de nacimiento</label>
                        <input class="form-control form-control-lg" id="demoDate" type="text" >                     
                      </div>
                    </form>
                  </div>
                  <div class="col-lg-5 offset-lg-1">
                    <form>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Apellidos</label>
                        <input class="form-control form-control-lg" id="exampleInputEmail1" type="email" aria-describedby="emailHelp" >
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Password</label>
                        <input class="form-control form-control-lg" id="exampleInputPassword1" type="password" >
                      </div>
                      <div class="form-group">
                        <label for="exampleSelect1">Rol</label>
                        <select class="form-control form-control-lg" id="exampleSelect1">
                        <option>Cliente</option>
                        <option>Administrador</option>
                        </select>
                      </div>
                    </form>
                  </div>
                </div>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" type="button"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
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
    <script>    
      $('#demoDate').datepicker({
      	format: "dd/mm/yyyy",
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