<?php 
include('../../models/product.php');
$new_product = new Product();
$id=$_GET['id'];
session_start();

if($_POST) {
  if(!isset($_SESSION['carrito'])){
      $res_product = $new_product->getProduct($_POST['product_id']);
      $product = array(
              'productid'=>$_POST['product_id'],
              'nombre'=>$res_product['nombre'],
              'precio'=> $res_product['precio'],
              'imagen'=>$res_product['imagen'],
              'cantidad'=>(int)$_POST['cantidad']
              );
      $_SESSION['carrito'][0] = $product;
  }
  else {
      $item_array_id = array_column($_SESSION['carrito'],'productid');
      if(in_array($_POST['product_id'], $item_array_id)){
          foreach($_SESSION['carrito'] as $indice=>$producto){
              if($producto['productid'] == $_POST['product_id']){
                  $_SESSION['carrito'][$indice]['cantidad'] = $_SESSION['carrito'][$indice]['cantidad']+(int)$_POST['cantidad'];
                  break;
              }
          }
      }
      else{
          $count = count($_SESSION['carrito']);
          $res_product = $new_product->getProduct($_POST['product_id']);
          $product = array(
              'productid'=>$_POST['product_id'],
              'nombre'=>$res_product['nombre'],
              'precio'=> $res_product['precio'],
              'imagen'=>$res_product['imagen'],
              'cantidad'=>(int)$_POST['cantidad']
              );
          $_SESSION['carrito'][$count] = $product;
      }
  }
  print_r($_SESSION['carrito']);
}

$req_product =  $new_product->getProduct($id);
?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Product</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>  
    <main>
        <div class="container">
            <section class="product-detail">
                <div class="details container">
                  <div class="left">
                    <div class="main-img">
                      <img src="../../assets/images/products/big/<?php echo $req_product['imagen'];?>" id="pic">
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
                    <form action="" method="post">
                      <div class="product-detail__content">
                          <h3><?php echo $req_product['nombre'];?></h3>
                          <div class="price">
                            <span class="new__price">S/ <?php echo $req_product['precio'];?></span>
                          </div>
                          <p><?php echo $req_product['descripcion'];?></p>
                          <div class="product__info-container">
                            <ul class="product__info">
                              <li>
                                <div class="input-counter">
                                  <span>Cantidad:</span>
                                  <div class="btn-group mas-menos  " role="group">
                                    <button type="button" class="btn btn-secondary quantity-modify quantity-sub">-
                                    </button>
                                    <input id="article-quantity" class="form-control input-units" type="text" value="1" data-max="9999" data-id="340676" autocomplete="off" data-refubrished="false" data-digital="false" name="cantidad">
                                    <button type="button" class="btn btn-secondary quantity-modify quantity-add">+</button>
                                  </div>
                                </div>
                              </li>
                              <li>
                                <span>Disponibilidad:</span>
                                <a href="#" class="in-stock">En Stock (<?php echo $req_product['stock'];?> Items)</a>
                              </li>
                            </ul>
                            <div class="product-info__btn">
                              <button type="submit" class="product-btn add-cart">Añadir al carrito</button>
                            </div>
                            <input type="hidden" name="product_id" value="<?php echo $req_product['id'];?>">
                          </div>
                        </div>
                      </div>
                    </form>
                </div>
              </section>
        </div>
    </main>
    <script>
      const addBtn = document.querySelector('.quantity-add'),
            subBtn = document.querySelector('.quantity-sub'),
            inputUnits = document.querySelector('.input-units');

      addBtn.addEventListener('click',()=>{
        inputUnits.value = parseInt(inputUnits.value)+1;
      })
      subBtn.addEventListener('click',()=>{
        if(inputUnits.value > "1"){
          inputUnits.value = parseInt(inputUnits.value)-1;
          } 
          else alert("No es posible ingresar valores negativos ni 0");
      })
      inputUnits.addEventListener('change',function(){
        if (this.value <= "0" || !this.value.match('[0-9]+')){
          alert("Valor no permitido");
          this.value = this.oldValue;
          }
          else {
              this.oldValue=this.value;
          }
      })
      inputUnits.addEventListener('focus',function(){
        this.oldValue=this.value;
      })

    </script>
</body>
</html>