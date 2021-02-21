<?php 
include('../models/queries_new_product.php');
$new_product = new Queries_new_product();
$res="";
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>
    <?php

    $id=$_REQUEST['id'];
    print_r($id);
                $req_product =  $new_product->show_product();
             foreach($req_product as $valor){
               if($valor['id']==$id){
             ?>  
    <main>
        <div class="container">
            <section class="product-detail">
                <div class="details container">
                  <div class="left">
                    <div class="main-img">
                    <img src="admin/imagenes/<?php echo $valor['ruta_imagen'];?>" alt="">
                      <!-- <img src="./images/products/iPhone/iphone5.jpeg" id="pic"> -->
                    </div>
                    <!-- <div class="thumbnails">
                      <div class="thumbnail">
                        <img class="picture" src="./images/products/iPhone/iphone1.jpeg" id="pic1">
                      </div>
                      <div class="thumbnail">
                        <img class="picture" src="./images/products/iPhone/iphone2.jpeg" id="pic1">
                      </div>
                      <div class="thumbnail">
                        <img class="picture" src="./images/products/iPhone/iphone3.jpeg" id="pic1">
                      </div>
                      <div class="thumbnail">
                        <img class="picture" src="./images/products/iPhone/iphone4.jpeg" id="pic1">
                      </div>
                    </div> -->
                  </div>
                  <div class="right">
                    <div class="product-detail__content">
                        <h3><?php echo $valor['nombre'];?></h3>
                        <div class="price">
                          <span class="new__price"><?php echo $valor['precio'];?> USD</span>
                        </div>
                        <p><?php echo $valor['descripcion'];?></p>
                        <div class="product__info-container">
                          <ul class="product__info">
                            <li>
                              <div class="input-counter">
                                <span>Cantidad:</span>
                                <div class="btn-group mas-menos  " role="group">
                                  <button type="button" class="btn btn-secondary quantity-modify quantity-sub"><i class="pccom-icon">-</i>
                                  </button>
                                  <input id="article-quantity" class="form-control input-units" type="text" value="1" data-max="9999" data-id="340676" autocomplete="off" data-refubrished="false" data-digital="false">
                                  <button type="button" class="btn btn-secondary quantity-modify quantity-add"><i class="pccom-icon ">+</i></button>
                                </div>
                              </div>
                            </li>
                            <li>
                              <span>Disponibilidad:</span>
                              <a href="#" class="in-stock">En Stock (<?php echo $valor['stock'];?> Items)</a>
                            </li>
                          </ul>
                          <div class="product-info__btn">
                            <a href="" class="product-btn add-cart">Añadir al carrito</a>
                          </div>
                        </div>
                      </div>
                  </div>
                </div>
              </section>
        </div>
    </main>
    <?php
        }
      }
    ?>
    <script src="../assets/js/app.js"></script>
</body>
</html>