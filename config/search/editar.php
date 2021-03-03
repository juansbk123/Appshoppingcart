<?php
include('../../models/product.php');
$new_product = new Product();
$req_product = "";
if(isset($_GET['id'])){
    $id = $_GET['id'];
    if(!empty($id)) $req_product = $new_product->getProduct($id);
}

echo json_encode($req_product);

?>