<?php
    session_start();
    session_unset();
    session_destroy();
    header("Location:http://localhost/uNJBG/ING_WEB_Vlll/PHP/project/views/admin/añadir_producto.php");
?>