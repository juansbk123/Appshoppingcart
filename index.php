<?php
$url = !empty($_GET['url']) ? ($_GET['url']) : 'home';
$arrUrl = explode("/", $url);
$controller = $arrUrl[0];
$controllerFile = "views/client/".$controller.".php";
if(file_exists($controllerFile)) {
    header("Location:".$controllerFile);
}
?>