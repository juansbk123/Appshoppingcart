<?php
session_start();
$arreglo = $_SESSION['carrito'];
$subtotal = 0;
for($i=0;$i<count($arreglo);$i++){
    if($arreglo[$i]['productid'] == $_POST['id']){
        $arreglo[$i]['cantidad'] = $_POST['cantidad'];
        $_SESSION['carrito'] = $arreglo;
    }
    $subtotal += (float)$_SESSION['carrito'][$i]['precio'] * $_SESSION['carrito'][$i]['cantidad'];
}
echo $subtotal;
?>