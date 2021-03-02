<?php
session_start();
if ($_POST){
    foreach ($_SESSION['carrito'] as $key => $value){
        if($value["productid"] == $_POST['id']){
            unset($_SESSION['carrito'][$key]);
        }
    }
}
?>