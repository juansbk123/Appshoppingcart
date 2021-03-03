<?php 
    include('../../models/product.php');

    session_start();
    if(empty($_SESSION['login']) || !$_SESSION['userData']['rol'] == "Administrador"){
      header('Location:../client/login.php');
    }
    $new_product = new Product();

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

    if($_POST){
      if(empty($_POST['name_product']) || empty($_POST['description_product'] ) || empty($_POST['price_product'])  || empty($_POST['stock_product'])) {     
        $res = "datos invalidos";
      } 
      else {
            $id_produ = $_POST['id'];
            $name_produ = $_POST['name_product'];
            $description_produ = $_POST['description_product'];
            $price_produ = $_POST['price_product'];
            $stock_produ = $_POST['stock_product'];
            $nombre_file = $_FILES['file']['name'] ?? $_POST['imagen'];
            $req_product =  $new_product->updateProduct($id_produ,$name_produ,$description_produ,$price_produ,$nombre_file ,$stock_produ);
          if($req_product){
              $res = "Se actualizo correctamente";
              if(!empty($_FILES['file']['name'])) obtener_nombre_imagen();
          }
      }
    }

    $products =  $new_product->show_product();
?>
<!DOCTYPE html>
<html lang="es">
  <head>
    <!-- Twitter meta-->
    <title>Lista de productos</title>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- Main CSS-->
    <link rel="stylesheet" type="text/css" href="http://localhost/IngWeb/project/assets/css/main.css">
    <style>
      .btn .fa {
        margin-right: 0;
      }
    </style>
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
          <li class="breadcrumb-item"><a href="#">Lista de productos</a></li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
            <h3 class="tile-title">Lista de productos</h3>
            <div class="tile-body">
              <div class="table-responsive">
                <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="sampleTable_length"><label>Mostrar <select name="sampleTable_length" aria-controls="sampleTable" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> registros</label></div></div><div class="col-sm-12 col-md-6"><div id="sampleTable_filter" class="dataTables_filter"><label>Buscar:<input type="search" class="form-control form-control-sm" placeholder="" aria-controls="sampleTable"></label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                  <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">ID</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 253px;">Nombre</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 109px;">Precio</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">Stock</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 86px;">Acciones</th></tr>
                  </thead>
                  <tbody> 
                  <?php

                  foreach($products as $valor){
                  
                  ?>
                  <tr role="row" class="odd">
                      <td class="sorting_1"><?php echo $valor['id'];?></td>
                      <td><?php echo $valor['nombre'];?></td>
                      <td>S/<?php echo $valor['precio'];?></td>
                      <td><?php echo $valor['stock'];?></td>
                      <td>
                        <div class="text-center">
                          <button class="btn btn-primary btn-sm btnEditRol" title="Editar" id="btn-edit" data-id="<?php echo $valor['id'];?>"><i class="fa fa-pencil"></i></button>
                          <button class="btn btn-danger btn-sm btnDelRol" title="Eliminar"><i class="fa fa-trash"></i></button>
                        </div>
                      </td>
                    </tr>

                    <?php
                  }
                    ?>
                </tbody>
                </table></div></div><div class="row"><div class="col-sm-12 col-md-5"><div class="dataTables_info" id="sampleTable_info" role="status" aria-live="polite">Showing 1 to 10 of 57 entries</div></div><div class="col-sm-12 col-md-7"><div class="dataTables_paginate paging_simple_numbers" id="sampleTable_paginate"><ul class="pagination"><li class="paginate_button page-item previous disabled" id="sampleTable_previous"><a href="#" aria-controls="sampleTable" data-dt-idx="0" tabindex="0" class="page-link">Previous</a></li><li class="paginate_button page-item active"><a href="#" aria-controls="sampleTable" data-dt-idx="1" tabindex="0" class="page-link">1</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="2" tabindex="0" class="page-link">2</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="3" tabindex="0" class="page-link">3</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="4" tabindex="0" class="page-link">4</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="5" tabindex="0" class="page-link">5</a></li><li class="paginate_button page-item "><a href="#" aria-controls="sampleTable" data-dt-idx="6" tabindex="0" class="page-link">6</a></li><li class="paginate_button page-item next" id="sampleTable_next"><a href="#" aria-controls="sampleTable" data-dt-idx="7" tabindex="0" class="page-link">Next</a></li></ul></div></div></div></div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
    <div class="modal" id="modal-create">
                <div class="modal-dialog" role="document">
                  <div class="modal-content">
                    <div class="modal-header">
                      <h5 class="modal-title">Actualizar Producto</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <form action="" method="post" id="form-login">
                      <div class="modal-body">
                        <div class="form-group">
                            <label class="control-label">Nombre</label>
                            <input class="form-control" type="text" name="name_product" id="input1">
                        </div>
                        <div class="form-group">
                          <label for="exampleInputEmail1">Descripcion</label>
                          <textarea class="form-control" rows="4" name="description_product" id="input3"></textarea>
                        </div>
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
                        <div class="form-group">
                          <label class="control-label">Imagen</label>
                          <input class="form-control-file" id="input5" type="file" aria-describedby="fileHelp" name="file">
                          <input type="hidden" name="imagen" id="input6" value="">                      
                          <input type="hidden" name="id" id="input0" value="">                      
                        </div>
                      </div>
                      <div class="modal-footer">
                        <button class="btn btn-primary" type="submit">Guardar</button>
                        <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
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
      const btnEdit = document.querySelectorAll('#btn-edit');
      btnEdit.forEach(el=>{
        el.addEventListener('click',()=>{
          let id = el.dataset.id;
          fetch('../../config/search/editar.php?id='+id)
          .then(res=>res.json())
          .then(res=>{
            document.getElementById('input0').value = res.id;
            document.getElementById('input1').value = res.nombre;
            document.getElementById('input2').value = res.precio.substring(0, res.precio.length-3);;
            document.getElementById('input3').value = res.descripcion;
            document.getElementById('input4').value = res.stock;
            document.getElementById('input6').value = res.imagen;
            $('#modal-create').modal('show');
          });
        })
      })
    </script>
  </body>
</html>