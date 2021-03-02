<?php
include('../../models/product.php');
$new_product = new Product();
session_start();
if(empty($_SESSION['login']) || !$_SESSION['userData']['rol'] == "Cliente"){
    header('Location:../client/login.php');
  }



?>
<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../../assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>   
    <main>
        <div class="container">
            <div class="row">
                <div class="main-1">
                    <div class="cart-title">
                        <h2>(<?php
                                if (isset($_SESSION['carrito'])){
                                    $count = count($_SESSION['carrito']);
                                    echo $count;
                                }
                                else echo "0";
                            ?>) Articulos en el carrito</h2>
                    </div>
                    <?php if(isset($_SESSION['carrito'])){ ?> 
                    <div class="cart-table">
                        <div class="tabla-carrito-condensada shopping-list" id="cart-container">           
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
                                                <div class="celda articulo-carrito-condensado__eliminar text-xs-right">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <?php
                                $subtotal = 0;
                                foreach($_SESSION['carrito'] as $indice=>$producto){
                                $subtotal += ($producto['cantidad'] * (float)$producto['precio']);
                            ?>                              
                            <div class="shopping-item articulo-carrito-condensado atrapatodo product-263600">
                                <div class="subtabla">
                                    <div class="celda articulo-carrito-condensado__foto">
                                        <a href="#">
                                            <img class="foto img-fluid" src="../../assets/images/products/small/<?php echo $producto['imagen'];?>" alt="imagen">
                                        </a>
                                    </div>
                                    <div class="celda articulo-carrito-condensado__datos">
                                        <div class="subtabla">
                                            <div class="celda superpuesta-sm articulo-carrito-condensado__texto">
                                                <div class="h5">
                                                    <a href="product.php?id=<?php echo $producto['productid'];?>" class="enlace-disimulado"><?php echo $producto['nombre'];?></a>
                                                </div>
                                            </div>
                                            <div class="celda superpuesta-sm articulo-carrito-condensado__numeros is-normal">
                                                <div class="subtabla">
                                                    <div class="celda articulo-carrito-condensado__precio hidden-md-down text-center">
                                                        <span>S/ </span><span id="precio"><?php echo $producto['precio'];?></span>
                                                    </div>
                                                    <div class="celda articulo-carrito-condensado__cantidad text-center">
                                                        <span class="btn-group mas-menos btn-group-sm" role="group">
                                                            <button type="button" class="btn btn-secondary btn-minus quantity-sub">
                                                                -
                                                            </button>
                                                            <input data-initialvalue="1" class="form-control form-control-sm input-units" data-id="<?php echo $producto['productid'];
                                                            ?>" autocomplete="off" type="text" value="<?php echo $producto['cantidad'];
                                                            ?>">
                                                            <button type="button" class="btn btn-secondary btn-plus quantity-add">
                                                                +
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div class="celda articulo-carrito-condensado__coste text-center">
                                                        <span>S/ </span><span id="precio-total"><?php $total = (int)$producto['cantidad'] * (int)$producto['precio'];
                                                        echo number_format((float)$total, 2, '.', '');
                                                        ?></span>
                                                    </div>
                                                    <div class="celda articulo-carrito-condensado__eliminar text-xs-right">
                                                        <a class="enlace-secundario GTM-removeFromCart" data-id="<?php echo $producto['productid'];?>">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="30"><path d="M432 144l-28.67 275.74A32 32 0 01371.55 448H140.46a32 32 0 01-31.78-28.26L80 144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><rect x="32" y="64" width="448" height="80" rx="16" ry="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M312 240L200 352M312 352L200 240"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                             
                                    </div>
                                </div>
                            </div>
                            <?php
                                    }
                                    $total = $subtotal;
                            ?>
                        </div>
                        <div class="acciones-carrito-pago m-t-1"><div style="margin-top: 20px;"><div class="col-xs-12 col-md-3"><a id="GTM-carrito-vaciarcarrito" href="#" class="btn btn-submit btn-block form-control-margin"><svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="18" style="vertical-align: sub;margin-right:5px;"><title>Trash</title><path d="M112 112l20 320c.95 18.49 14.4 32 32 32h184c17.67 0 30.87-13.51 32-32l20-320" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M80 112h352"/><path d="M192 112V72h0a23.93 23.93 0 0124-24h80a23.93 23.93 0 0124 24h0v40M256 176v224M184 176l8 224M328 176l-8 224" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>Vaciar carrito</a></div></div></div>
                    </div>
                    <?php } 
                    
                    else echo "Tu carrito esta vacio"
                    ?>
                    
                    
                </div>
                <div class="side-1">
                    <div class="card-container price-container">
                        <div class="next-loading next-loading-inline loading">
                            <div class="next-loading-wrap">
                                <div class="price">
                                    <h2>Resumen del pedido</h2>
                                    <div id="shoppingcart-price" class="shoppingcart-price">
                                        <div class="order-charge-container">
                                            <div>
                                                <div class="cupon">
                                                    <label for="">¿Tienes un cupon de descuento?</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-input" id="codigo_cupon" data-id="">
                                                        <button type="button" class="btn input-group-btn" id="aplicar_cupon">Aplicar</button>
                                                    </div>
                                                </div>
                                                <div class="charges-group">
                                                    <dl class="charges-totle ">
                                                        <dt> Subtotal</dt>
                                                        <dd>S/ <span id="subtotal"><?php if(isset($_SESSION['carrito'])) echo number_format($subtotal, 2, '.', ''); else echo "0.00"?></span></dd>
                                                    </dl>
                                                </div>
                                                <div st_page_id="zcv6gdqpowkcabmg176ce11a64d186528810b4de56" ae_page_type="Shopping_Cart_Page" ae_page_area="Check_out" ae_button_type="savings" ae_object_type="button" class="charges-group">
                                                    <dl class="charges-totle">
                                                        <dt> Descuento <span id="desc_amount" data-val="0" data-tipo="p"></span></dt>
                                                        <dd>-S/ <span id="desc">0.00</span></dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="total-price">
                                        <dl>
                                            <dt>Total</dt>
                                            <dd>S/ <span id="total"><?php if(isset($_SESSION['carrito'])) echo number_format($total, 2, '.', ''); else echo "0.00";?></span></dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="order-btn-holder">
                                    <button type="button" class="next-btn next-large next-btn-primary" role="button" id="btn_pedido"><span class="click-mask"></span>Realizar pedido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../../assets/js/app.js"></script>
    <script>
    const close = document.querySelectorAll('.GTM-removeFromCart'),
          btnPedido = document.getElementById('btn_pedido');
                                    
    close.forEach((b)=>{
        b.addEventListener('click',(e)=>{
        let id = e.currentTarget.dataset.id,
            formData = new FormData();
        formData.append("id", id);
        fetch('../../config/ep.php',{
            method:"POST",
            body: formData
        }).then(res=> location.reload());
        })
    })

    btnPedido.addEventListener('click',()=>{
        let total = document.getElementById('total').textContent,
            idCupon = document.getElementById('codigo_cupon').dataset.id,
            formData = new FormData();
        idCupon && formData.append("id", idCupon);
        formData.append("total", total);
        fetch('../../controllers/pedido/procesarpedido.php',{
            method:"POST",
            body: formData
        }).then(res=> res.json())
        .then(res=>{
            if(res.success){
                window.location = "thankyou.php";
            }
            else{
                alert(res.message);
            }
        });
    })
    </script>
</body>
</html>
