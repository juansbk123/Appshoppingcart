<?php
    include('../../models/product.php');

    session_start();
    if(empty($_SESSION['login']) || !$_SESSION['userData']['rol'] == "Administrador"){
      header('Location:../client/login.php');
    }
    $new_product = new Product();
    $res="";
  
  function obtener_nombre_imagen(){    
    $name_file = $_FILES['file']['name'];
    $type_file = $_FILES['file']['type'];
    $size_file = $_FILES['file']['size'];
    if($size_file<=3000000){

      if($type_file=="image/jpeg" || $type_file=="image/png"){
            $origin = "";
            if($type_file == "image/jpeg"){
                $origin = imagecreatefromjpeg($_FILES['file']["tmp_name"]);
            }
            elseif($type_file == "image/png"){
                $origin = imagecreatefrompng($_FILES['file']["tmp_name"]);
            }
            list($width,$height) = getimagesize($_FILES['file']["tmp_name"]);
            $thumb_small = imagecreatetruecolor(107,107);
            imagecopyresampled($thumb_small,$origin,0,0,0,0,107,107,$width,$height);
            imagejpeg($thumb_small,"../../assets/images/products/small/".$name_file,100);
            $thumb_medium = imagecreatetruecolor(230,180);
            imagecopyresampled($thumb_medium,$origin,0,0,0,0,230,180,$width,$height);
            imagejpeg($thumb_medium,"../../assets/images/products/medium/".$name_file,100);
            $thumb_big = imagecreatetruecolor(390,290);
            imagecopyresampled($thumb_big,$origin,0,0,0,0,390,290,$width,$height);
            imagejpeg($thumb_big,"../../assets/images/products/big/".$name_file,100);
            imagedestroy($thumb_small);
            imagedestroy($thumb_medium);
            imagedestroy($thumb_big);
            imagedestroy($origin);
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
            <form class="" method="post" action="" enctype="multipart/form-data" id="form-login"> 
            <div class="tile-body">
                <div class="row">
                  <div class="col-lg-5">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Nombre</label>
                        <input class="form-control form-control-lg" id="input1" type="text" aria-describedby="emailHelp" name="name_product" autofocus>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Descripcion</label>
                        <textarea class="form-control" rows="4" name="description_product" id="input3"></textarea>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputEmail1">Imagen</label>
                        <input class="form-control-file" id="input5" type="file" aria-describedby="fileHelp" name="file">                      
                      </div>
                  </div>
                  <div class="col-lg-5 offset-lg-1">
                      <div class="form-group">
                        <label for="exampleInputEmail1">Precio</label>
                        <div class="input-group">
                        <div class="input-group-prepend"><span class="input-group-text">S/</span></div>
                        <input class="form-control form-control-lg" id="input2" type="text" name="price_product">
                        <div class="input-group-append"><span class="input-group-text">.00</span></div>
                      </div>
                      </div>
                      <div class="form-group">
                        <label for="exampleInputPassword1">Stock</label>
                        <input class="form-control form-control-lg" id="input4" type="number"  name="stock_product">
                      </div>
                      <!-- <button class="btn login-btn" name="anadir_producto" type="submit">Acceder</button> -->

                  </div>
                </div>
            </div>
            <div class="tile-footer">
                <button class="btn btn-primary" name="anadir_producto" type="submit"><i class="fa fa-fw fa-lg fa-check-circle"></i>Registrar</button>
            </div>
          </div>
        </div>
      </div>
      </form>
    </main>
    <!-- Essential javascripts for application to work-->
    <script src="http://localhost/IngWeb/project/assets/js/jquery-3.3.1.min.js"></script>
    <script src="http://localhost/IngWeb/project/assets/js/popper.min.js"></script>
    <script src="http://localhost/IngWeb/project/assets/js/bootstrap.min.js"></script>
    <script src="http://localhost/IngWeb/project/assets/js/main.js"></script>
    <!-- The javascript plugin to display page loading on top-->
    <script src="http://localhost/IngWeb/project/assets/js/plugins/pace.min.js"></script>
    <!-- Page specific javascripts-->
    <!-- Google analytics script-->
    <script type="text/javascript">

    $(window).keydown(function(event){
        if(event.keyCode == 13) {
          event.preventDefault();
          return false;
        }
      });
      function priceIsValid (price) {
        return /^[0-9]+$/.test(price)  
      }
      const form = document.getElementById('form-login');
      
      form.addEventListener('submit',(e)=>{
        e.preventDefault();
            if (!priceIsValid(document.getElementById('input2').value)){
                alert('Precio invalido');
                document.getElementById('input2').classList.add('is-invalid');
            }
            else if (!priceIsValid(document.getElementById('input4').value)){
                alert('Stock invalida');
                document.getElementById('input4').classList.add('is-invalid');
            } 
            else form.submit();
      })

      form.querySelectorAll('input').forEach((el)=>{
            el.addEventListener('focus',(e)=>e.target.classList.remove('is-invalid'));
      })

      form.addEventListener('keydown',(e)=>{
            if(e.keyCode == "13" || e.keyCode == "40"){
                if (e.target.id != "input5"){
                  let i = e.target.id.slice('-1'); 
                  if(e.target.id == "input2") e.target.parentNode.parentNode.parentNode.parentNode.querySelector(`#input${Number(i)+1}`).focus();
                  else e.target.parentNode.parentNode.parentNode.querySelector(`#input${Number(i)+1}`).focus();
                }
                else document.formlogin.submit();
            }
        });
    </script>
  </body>
</html>