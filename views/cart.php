<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Cart</title>
    <link rel="stylesheet" href="../assets/css/styles.css">
</head>
<body>
    <?php include("header.php"); ?>   
    <main>
        <div class="container">
            <div class="row">
                <div class="main-1">
                    <div class="cart-title">
                        <h2>2 Articulos en el carrito</h2>
                    </div>
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
                                                <div class="celda articulo-carrito-condensado__eliminar text-xs-right">

                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>                              
                            <div class="shopping-item articulo-carrito-condensado atrapatodo product-263600">
                                <div class="subtabla">
                                    <div class="celda articulo-carrito-condensado__foto">
                                        <a href="#">
                                            <img class="foto img-fluid" src="" alt="Microsoft Surface Pro 7 Intel Core i5-1035G4/8GB/128GB SSD/12.3&quot; Táctil Platino">
                                        </a>
                                    </div>
                                    <div class="celda articulo-carrito-condensado__datos">
                                        <div class="subtabla">
                                            <div class="celda superpuesta-sm articulo-carrito-condensado__texto">
                                                <div class="h5">
                                                    <a href="#" class="enlace-disimulado">Microsoft Surface Pro 7 Intel Core i5-1035G4/8GB/128GB SSD/12.3" Táctil Platino</a>
                                                </div>
                                            </div>
                                            <div class="celda superpuesta-sm articulo-carrito-condensado__numeros is-normal">
                                                <div class="subtabla">
                                                    <div class="celda articulo-carrito-condensado__precio hidden-md-down text-center">
                                                        <span>$ </span><span id="precio">859.50</span>
                                                    </div>
                                                    <div class="celda articulo-carrito-condensado__cantidad text-center">
                                                        <span class="btn-group mas-menos btn-group-sm" role="group">
                                                            <button type="button" class="btn btn-secondary btn-minus quantity-sub">
                                                                <i class="pccom-icon GTM-removeFromCart">-</i>
                                                            </button>
                                                            <input data-initialvalue="1" class="form-control form-control-sm input-units" data-id="263600" autocomplete="off" type="text" value="1">
                                                            <button type="button" class="btn btn-secondary btn-plus quantity-add">
                                                                <i class="pccom-icon GTM-addToCart">+</i>
                                                            </button>
                                                        </span>
                                                    </div>
                                                    <div class="celda articulo-carrito-condensado__coste text-center">
                                                        <span>$ </span><span id="precio-total">859.00</span>
                                                    </div>
                                                    <div class="celda articulo-carrito-condensado__eliminar text-xs-right">
                                                        <a class="enlace-secundario GTM-removeFromCart">
                                                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="30"><path d="M432 144l-28.67 275.74A32 32 0 01371.55 448H140.46a32 32 0 01-31.78-28.26L80 144" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><rect x="32" y="64" width="448" height="80" rx="16" ry="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M312 240L200 352M312 352L200 240"/></svg>
                                                        </a>
                                                    </div>
                                                </div>
                                            </div>
                                        </div>                             
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="side-1">
                    <div class="card-container price-container">
                        <div class="next-loading next-loading-inline loading">
                            <div class="next-loading-wrap">
                                <div class="price" data-spm-anchor-id="a2g0o.cart.0.i16.459f3c00UGnaWf">
                                    <h2>Resumen del pedido</h2>
                                    <div id="shoppingcart-price" class="shoppingcart-price">
                                        <div class="order-charge-container">
                                            <div>
                                                <div class="cupon">
                                                    <label for="">¿Tienes un cupon de descuento?</label>
                                                    <div class="input-group">
                                                        <input type="text" class="form-input">
                                                        <button type="button" class="btn input-group-btn">Aplicar</button>
                                                    </div>
                                                </div>
                                                <div class="charges-group">
                                                    <dl class="charges-totle ">
                                                        <dt> Subtotal</dt>
                                                        <dd>€ 0,00</dd>
                                                    </dl>
                                                </div>
                                                <div st_page_id="zcv6gdqpowkcabmg176ce11a64d186528810b4de56" ae_page_type="Shopping_Cart_Page" ae_page_area="Check_out" ae_button_type="savings" ae_object_type="button" class="charges-group">
                                                    <dl class="charges-totle ">
                                                        <dt> Envío</dt>
                                                        <dd>€ 0,00</dd>
                                                    </dl>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="total-price">
                                        <dl>
                                            <dt>Total</dt>
                                            <dd>€ 0,00</dd>
                                        </dl>
                                    </div>
                                </div>
                                <div class="order-btn-holder">
                                    <button id="checkout-button" type="button" class="next-btn next-large next-btn-primary" role="button"><span class="click-mask"></span>Realizar pedido</button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </main>
    <script src="../assets/js/app.js"></script>
</body>
</html>
