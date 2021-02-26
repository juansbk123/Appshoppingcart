<?php 
    include('../../models/coupon.php');

    session_start();
    $coupon = new Coupon();

    $coupons =  $coupon->getAllCoupons();

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
          <h1><i class="fa fa-dashboard"></i> Cupones</h1>
        </div>
        <ul class="app-breadcrumb breadcrumb">
          <li class="breadcrumb-item"><i class="fa fa-home fa-lg"></i></li>
          <li class="breadcrumb-item">Cupones</li>
        </ul>
      </div>
      <div class="row">
        <div class="col-md-12">
          <div class="tile">
          <div class="row mb-3">
            <div class="col-md-10">
                <h3 class="tile-title">Lista de cupones</h3>
            </div>
            <div class="col-md-2">
                <button class="mb-2 btn btn-primary btn-block" type="button" data-toggle="modal" data-target="#modal-create">Agregar cupon</button>
            </div>
          </div>
            <div class="tile-body">
              <div class="table-responsive">
                <div id="sampleTable_wrapper" class="dataTables_wrapper container-fluid dt-bootstrap4 no-footer"><div class="row"><div class="col-sm-12 col-md-6"><div class="dataTables_length" id="sampleTable_length"><label>Mostrar <select name="sampleTable_length" aria-controls="sampleTable" class="form-control form-control-sm"><option value="10">10</option><option value="25">25</option><option value="50">50</option><option value="100">100</option></select> registros</label></div></div></div><div class="row"><div class="col-sm-12"><table class="table table-hover table-bordered dataTable no-footer" id="sampleTable" role="grid" aria-describedby="sampleTable_info">
                  <thead>
                    <tr role="row"><th class="sorting_asc" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-sort="ascending" aria-label="Name: activate to sort column descending" style="width: 150px;">Codigo de cupon</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Position: activate to sort column ascending" style="width: 253px;">Estado</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Office: activate to sort column ascending" style="width: 109px;">Tipo</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Age: activate to sort column ascending" style="width: 54px;">Valor</th><th class="sorting" tabindex="0" aria-controls="sampleTable" rowspan="1" colspan="1" aria-label="Salary: activate to sort column ascending" style="width: 86px;">Acciones</th></tr>
                  </thead>
                  <tbody> 
                  <?php

                  foreach($coupons as $valor){

                  ?>        
                  <tr role="row" class="odd">
                      <td class="sorting_1"><?php echo $valor['codigo_cupon'];?></td>
                      <td><?php echo $valor['estado'];?></td>
                      <td><?php echo $valor['tipo'];?></td>
                      <td><?php echo $valor['valor'];?></td>
                      <td><div class="text-center">
					<button class="btn btn-danger btn-sm btnDelRol" title="Eliminar"><i class="fa fa-trash"></i></button>
					</div></td>
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
                      <h5 class="modal-title">Añadir cupón</h5>
                      <button class="close" type="button" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">×</span></button>
                    </div>
                    <div class="modal-body">
                    <div class="form-group">
                        <label class="control-label">Codigo de cupon</label>
                        <input class="form-control" type="text" >
                    </div>
                    <div class="form-group">
                    <label for="exampleSelect1">Tipo</label>
                    <select class="form-control" id="exampleSelect1">
                      <option>Porcentaje</option>
                      <option>Monto</option>
                    </select>
                  </div>
                <div class="form-group">
                  <label class="control-label">Valor</label>
                  <input class="form-control" type="text" >
                </div>
                    </div>
                    <div class="modal-footer">
                      <button class="btn btn-primary" type="button">Guardar</button>
                      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancelar</button>
                    </div>
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