<?php
include('../../models/product.php');
$new_product = new Product();
$req_product = "";
if(isset($_GET)){
    $nombre = $_GET['q'];
    if(!empty($nombre)) $req_product = $new_product->show_product(null,$nombre);
}
$column = array_column($req_product,'nombre');
$column_unq = array_unique($column);
echo json_encode($column_unq);

?>