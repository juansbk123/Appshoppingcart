<?php
    session_start();
    $rol = $_SESSION['userData']['rol'];
    session_unset();
    session_destroy();
    header(($rol == 'Administrador') ? "Location: http://localhost/IngWeb/project/views/client/login.php" : "Location: http://localhost/IngWeb/project/views/client/home.php");
?>