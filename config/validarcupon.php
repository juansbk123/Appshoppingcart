<?php
include('../models/coupon.php');
$new_coupon = new Coupon();
if($_POST){
    $codigo = $_POST['codigo'];
    $res = $new_coupon->getCoupon($codigo);
    if(empty($res) || $res['estado']=='canjeado'){
        $res = [
            "success" => false,
            "message" => "No es posible canjear el cupon"
        ];
    }
    else {
        $res = [
            "success" => true,
            "id" => $res['id'],
            "message" => "Cupon canjeado",
            "tipo"=> $res['tipo'],
            "valor"=> $res['valor'] 
        ];
    }
    echo json_encode($res);
}
?>
