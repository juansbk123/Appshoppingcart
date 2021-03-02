<?php
include('../../models/order.php');
$new_order = new Order();
session_start();
if(empty($_SESSION['login']) || !$_SESSION['userData']['rol'] == "Cliente"){
    header('Location:../client/login.php');
  }
$orders = $new_order->getUserOrders($_SESSION['iduser']);

?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>  
    <main>
        <div class="container">
            <div class="row">
                <div class="side-2">
                    <div class="menu-panel-usuario__seccion-cuenta"><div class="menu-panel-usuario__encabezado"><strong>MI CUENTA</strong></div><ul class="menu-panel-usuario__listado"><li><a href="account.php" class="menu-panel-usuario__datos"><span class="pull-xs-left">Mis datos</span><span class="clearfix"></span></a></li><li><a href="orders.php" class="menu-panel-usuario__cestas"><span class="pull-xs-left">Mis pedidos</span><span class="pull-xs-right"></span><span class="clearfix"></span></a></li></ul></div>
                </div>
                <div class="main-2">
                    <div class="encabezado-2">
                        <h2>Mis pedidos</h2>
                    </div>
                    <?php
                    if(!empty($orders)){
                    foreach($orders as $valor){
                        $orderdetails = $new_order->getOrderDetails($valor['id']);
                        $cantidad = count($orderdetails);
                        
                    ?>

                    <div class="acc-pccom acc-order">
                        <div class="acc-block panel">
                            <div class="acc-block-title">
                                <a data-toggle="collapse" href="javascript:;" aria-expanded="true" id="order_header">
                                    <div class="acc-order__trigger">
                                        <div class="acc-order__trigger__order-data">
                                            <span class="acc-order__trigger__muted">Realizado:</span> <?php echo $valor['fecha'];?> | <?php echo $cantidad;?> artículo(s)<span class="acc-order__trigger__order-data__unpaid-order">Pedido sin pagar</span>
                                        </div>
                                    </div>
                                    <span class="acc-open-close pull-xs-right"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="16"><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="48" d="M112 184l144 144 144-144"/></svg></span>
                                </a>
                                <div class="acc-order__acc-block-title__order-sub-info ">
                                    <div class="acc-order__acc-block-title__order-number">
                                        <span class="acc-order__acc-block-title__muted">Nº de pedido: </span><?php echo $valor['id'];?>
                                    </div>
                                    <div class="order-total"><strong>Importe total: S/<span><?php echo $valor['total'];?></span></strong></div>
                                </div>
                            </div>
                            <div class="order-content collapse" id="order_body">
                                <div class="cart-table">
                                    <div class="tabla-carrito-condensada shopping-list">           
                                        <div class="subtabla tabla-carrito-condensada__encabezado hidden-md-down">
                                            <div class="celda articulo-carrito-condensado__foto">
                                                ARTÍCULO
                                            </div>
                                            <div class="celda articulo-carrito-condensado__datos">
                                                <div class="subtabla">
                                                    <div class="celda superpuesta-sm articulo-carrito-condensado__texto">
                                                    </div>
                                                    <div class="celda superpuesta-sm articulo-carrito-condensado__numeros">
                                                        <div class="subtabla">
                                                            <div class="celda articulo-carrito-condensado__precio hidden-md-down text-center">
                                                                PRECIO
                                                            </div>
                                                            <div class="celda articulo-carrito-condensado__cantidad text-center">
                                                                UNIDADES
                                                            </div>
                                                            <div class="celda articulo-carrito-condensado__coste text-center">
                                                                TOTAL
                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        foreach($orderdetails as $details){
                                        ?>
                                        <div class="shopping-item articulo-carrito-condensado atrapatodo product-263600">
                                            <div class="subtabla">
                                                <div class="celda articulo-carrito-condensado__foto">
                                                    <a href="#">
                                                        <img class="foto img-fluid" src="../../assets/images/products/small/<?php echo $details['imagen'];?>" alt="">
                                                    </a>
                                                </div>
                                                <div class="celda articulo-carrito-condensado__datos">
                                                    <div class="subtabla">
                                                        <div class="celda superpuesta-sm articulo-carrito-condensado__texto">
                                                            <div class="h5">
                                                                <a href="#" class="enlace-disimulado"><?php echo $details['nombre'];?></a>
                                                            </div>
                                                        </div>
                                                        <div class="celda superpuesta-sm articulo-carrito-condensado__numeros is-normal">
                                                            <div class="subtabla">
                                                                <div class="celda articulo-carrito-condensado__precio hidden-md-down text-center">
                                                                    <span>S/ </span><span id="precio"><?php echo $details['precio'];?></span>
                                                                </div>
                                                                <div class="celda articulo-carrito-condensado__cantidad text-center">
                                                                    <span><?php echo $details['cantidad'];?></span>
                                                                </div>
                                                                <div class="celda articulo-carrito-condensado__coste text-center">
                                                                    <span>S/ </span><span id="precio-total"><?php echo $details['total'];?></span>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>                             
                                                </div>
                                            </div>
                                        </div>
                                        <?php
                                        }
                                        ?>                
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                    <?php
                    }
                        }
                        else echo "No tiene pedidos"

                    ?>
                </div>
            </div>
        </div>
    </main>
    <script>
        const oh = document.querySelectorAll('#order_header'),
            ob = document.querySelectorAll('#order_body');
    
        oh.forEach((el)=>{
            el.addEventListener('click',(e)=>{
                 el.parentNode.nextElementSibling.classList.toggle('in');
            })
        })
    
    </script>
</body>
</html>