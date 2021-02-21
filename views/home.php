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
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/assets/css/styles.css">
</head>
<body>
    <?php include("header.php");
    ?>
    <main>
        <div class="container">
            <div class="title">
                <h2>Todos los productos</h2>
            </div>
            <div class="product-items">
                <?php
                $req_product =  $new_product->show_product();
             foreach($req_product as $valor){
             ?>
                    <div class="product">
                    <div class="product-image">
                        <img src="admin/imagenes/<?php echo $valor['ruta_imagen'];?>" alt="">
                    </div>
                    <div class="product-info">
                        <a href="product.php?id=<?php echo $valor['id'];?>" class="product-title"><span><?php 
                         echo $valor['nombre'];
                        ?> </span></a>
                        <span class="product-price"><?php echo $valor['precio'];?></span>
                        <a href="" class="product-btn">Añadir al carrito</a>
                    </div>
                </div>
                <?php
             }
                ?>
            </div>
        </div>
    </main>
</body>
</html>