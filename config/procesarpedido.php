<?php
include_once('../models/order.php');
$new_order = new Order();
session_start();
if($_POST){
    if(isset($_SESSION['carrito']) && !empty($_SESSION['carrito'])){
        $user_id = $_SESSION['iduser'];
        $total = $_POST['total'];
        $resp_1 = $new_order->addOrder($user_id,$total);
        if(!empty($resp_1)){
            foreach($_SESSION['carrito'] as $indice => $value){
                $product_id = $value['productid'];
                $cantidad = $value['cantidad'];
                $resp_2 = $new_order->addOrderDetails($resp_1,$product_id,$cantidad);
            }
            if(!empty($resp_2)){
                unset($_SESSION['carrito']);
                if(isset($_POST['id']) && !(isset($_SESSION['couponid']))) $_SESSION['couponid'] = $_POST['id']; 
                $res = [
                    "success" => true,
                    "message" => "Exito"
                ]; 
            }
        }
    }
    else {
        $res = [
            "success" => false,
            "message" => "El carrito esta vacio"
        ]; 
    }
    echo json_encode($res);
}
?>