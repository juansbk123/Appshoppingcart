<?php
include('../../models/product.php');
$new_product = new Product();
session_start();
$res="";

if($_POST) {
    if(!isset($_SESSION['carrito'])){
        $res_product = $new_product->getProduct($_POST['product_id']);
        $product = array(
                'productid'=>$_POST['product_id'],
                'nombre'=>$res_product['nombre'],
                'precio'=> $res_product['precio'],
                'imagen'=>$res_product['imagen'],
                'cantidad'=>1
                );
        $_SESSION['carrito'][0] = $product;
    }
    else {
        $item_array_id = array_column($_SESSION['carrito'],'productid');
        if(in_array($_POST['product_id'], $item_array_id)){
            foreach($_SESSION['carrito'] as $indice=>$producto){
                if($producto['productid'] == $_POST['product_id']){
                    $_SESSION['carrito'][$indice]['cantidad'] = $_SESSION['carrito'][$indice]['cantidad']+1;
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
                'cantidad'=>1
                );
            $_SESSION['carrito'][$count] = $product;
        }
    }
}
?>

<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Shopping Cart</title>
    <link rel="stylesheet" href="http://localhost/IngWeb/project/assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>  
    <main>
        <div class="container">
            <div class="title">
                <h2>Todos los productos</h2>
            </div>
            <div class="product-items">
                <?php

                $req_product = $new_product->show_product();
                if(isset($_GET['search_box'])){
                    $nombre = $_GET['search_box'];
                    if(!empty($nombre)) $req_product = $new_product->show_product(null,$nombre);
                }
                $totalRegistros = count($req_product);
                $elementosPorPagina = 12;

                $totalPaginas = ceil($totalRegistros / $elementosPorPagina);

                $paginaSel = $_REQUEST['pagina'] ?? false;

                if ($paginaSel == false) {
                    $inicioLimite = 0;
                    $paginaSel = 1;
                } else {
                    $inicioLimite = ($paginaSel - 1) * $elementosPorPagina;
                }
                $limite = "limit $inicioLimite,$elementosPorPagina";
                $req_product =  $new_product->show_product($limite);

                if(isset($_GET['search_box'])){
                    $nombre = $_GET['search_box'];
                    if(!empty($nombre)) $req_product = $new_product->show_product($limite,$nombre);
                }

             foreach($req_product as $valor){
             ?>
                    <div class="product">
                    <form action="" method="post">
                        <div class="product-image">
                            <img src="../../assets/images/products/medium/<?php echo $valor['imagen'];?>" alt="">
                        </div>
                        <div class="product-info">
                            <a href="product.php?id=<?php echo $valor['id'];?>" class="product-title"><span><?php echo $valor['nombre'];?></span></a>
                            <span class="product-price">S/ <?php echo $valor['precio'];?></span>
                            <?php if((isset($_SESSION['login']) && $_SESSION['login'])) echo "<button type='submit' class='product-btn'>Añadir al carrito</button>";
                            else echo "<a href='product.php?id={$valor['id']}' class='product-btn'> Ver detalles</a>";?>
                        </div>
                        <input type="hidden" name="product_id" value="<?php echo $valor['id'];?>">
                    </form>
                </div>
                <?php
             }

                ?>

            </div>
            <?php
            if($totalPaginas > 0){

            ?>
            <div class="pagination-wrapper">
                <div class="pagination">
                <?php
                    if($paginaSel != 1){
                ?>
                    <a class="prev page-numbers" href="home.php?pagina=<?php echo ($paginaSel - 1); ?>">❮</a>
                <?php
                    }
                ?>
                <?php
                    for ($i = 1; $i <= $totalPaginas; $i++) {
                ?>

                <?php echo ($paginaSel == $i) ? "<span aria-current='page' class='page-numbers current'>{$i}</span>" : "<a class='page-numbers' href='home.php?pagina={$i}'>{$i}</a>"; ?>

                <?php
                    }
                ?>
                <?php
                    if ($paginaSel != $totalPaginas) {
                ?>
                    <a class="next page-numbers" href="home.php?pagina=<?php echo ($paginaSel + 1); ?>">❯</a>
                <?php
                    }
                ?>
                </div>
            </div>
            <?php
            }
            ?>
        </div>
    </main>
    <script>
        const productBtn = document.querySelectorAll('.product-btn');

        productBtn.forEach(p=>{
            p.addEventListener('click',()=>{
                let cantidad = propmt("¿Cuantas unidades de este articulo deseas agregar al carrito?");
                let confirmar = confirm("¿Estas seguro?");
                if(confirmar) alert(`Se han añadido ${cantidad} unidad(es) de este articulo al carrito`);
            })
        })
    </script>
</body>
</html>