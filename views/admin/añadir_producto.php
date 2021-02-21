<?php
    include('../../models/queries_new_product.php');

    // session_start();
    $new_product = new Queries_new_product();
    $res="";
  
  function obtener_nombre_imagen(){    
   $nombre_file=$_FILES['file']['name'];

   $tamanio_file=$_FILES['file']['size'];
   $tipo_file=$_FILES['file']['type'];
   $directorio = "imagenes/";
  
   if($tamanio_file<=3000000){
       if($tipo_file=="image/jpg" || $tipo_file=="image/png" ||$tipo_file=="image/gif" || $tipo_file=="image/heic"){
           $archivo = $directorio . basename($nombre_file);          
               if (move_uploaded_file($_FILES["file"] ["tmp_name"], $archivo)) {
                   echo " solo se pueden subir images [jpg,png,gif,heic] \n archivo subido con exito";
          
               } else {
                   echo "error en la subida del archivo";
               }
       }
   }
  }
    if($_POST) 
  {
      if(empty($_POST['name_product']) || empty($_POST['description_product'] ) || empty($_POST['price_product'])  || empty($_POST['stock_product']) ) {
              
            $res = "datos invalidos";
      } 
        else {
                //rescatatmos datos del formulario
                $name_produ = $_POST['name_product'];
                $description_produ = $_POST['description_product'];
                $price_produ = $_POST['price_product'];
                $stock_produ = $_POST['stock_product'];
                $nombre_file = $_FILES['file']['name'];
                // print_r("$nombre_file",$name_produ,$description_produ, $price_produ, $stock_produ);

                $req_product =  $new_product->insert_product($name_produ,$description_produ,$price_produ,$nombre_file ,$stock_produ);
               if($req_product){
                  echo "Se inserto correctamente";
                obtener_nombre_imagen();

                }
        }
  }

?>

<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Twitter meta-->
    <title>Añadir productos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/assets/css/main.css">
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
          <h1><i class="fa fa-dashboard"></i> Productos</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Productos</li>
          <li class="breadcrumb-item"><a href="#">Añadir producto</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Añadir producto</h3>
            <div class="tile-body">
                <div class="row">
                  <div class="col-lg-5">
                    <!-- form-> -->
                    <form class="" method="post" action="" enctype="multipart/form-data" > 
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input class="form-control form-control-lg" id="exampleInputEmail1" type="text" aria-describedby="emailHelp" placeholder="Enter email" name="name_product">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <textarea class="form-control" rows="4" placeholder="Enter your address" name="description_product"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Imagen</label>
                        <input class="form-control-file" id="exampleInputFile" type="file" aria-describedby="fileHelp" name="file">                      
                      </div>
                        <!-- <button class="btn login-btn" name="login" type="submit">Acceder</button> -->
                    <!-- </form> -->
                 </div>
                  <div class="col-lg-5 offset-lg-1">
                    <!-- <form> -->
                      <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <input class="form-control form-control-lg" id="exampleInputEmail1" type="number" aria-describedby="emailHelp" placeholder="Enter email" name="price_product">
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Stock</label>
                        <input class="form-control form-control-lg" id="exampleInputPassword1" type="number" placeholder="Password"  name="stock_product">
                      </div>
                      <!-- <button class="btn login-btn" name="anadir_producto" type="submit">Acceder</button> -->

                  </div>
                </div>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" name="anadir_producto" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Register</button>
            </div>
          </div>
        </div>
      </div>
      </form>

    </main>
    <!-- Essential javascripts for application to work-->
    <script src="http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/assets/js/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/assets/js/popper.min.js"></script>
    <script src="http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/assets/js/bootstrap.min.js"></script>
    <script src="http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
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