<?php 
session_start();
if(isset($_SESSION['couponid'])){
    include_once('../../models/coupon.php');
    $new_coupon = new Coupon();
    $new_coupon->redeemCoupon($_SESSION['couponid']);
    unset($_SESSION['couponid']);
}
?>
<!DOCTYPE html>
<html lang="es">
  <head>
   <title>Tienda</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <link rel="stylesheet" type="text/css" href="http://localhost/IngWeb/project/assets/css/main.css">
    <style>
        * {
            margin: 0;
            padding: 0;
            box-sizing: inherit;
        }

        html {
            box-sizing: border-box;
            scroll-behavior: smooth;
            font-family: sans-serif;
        }

        body{
            font-size: 1.6rem;
        }

        a {
            text-decoration: none;
            cursor: pointer;
        }

        a:hover {
            text-decoration: none;
        }

        ul {
            list-style: none;
        }

        img {
            max-width: 100%;
        }

        label {
            display: inline-block;
            margin-bottom: .5rem;
            font-weight: 700;
            color: #444;
            font-size: 1.4rem;
        }

        .site-section {
            padding: 5em 0;
        }

        .fixed {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            background-color: #fff;
            z-index: 1200;
        }

        .navigation {
            height: 70px;
        }

        header {
            box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
        }

        .container {
            padding: 0 15px;
            max-width: 1170px;
            margin: 0 auto;
        }

        .site-logo a {
            font-size: 25px;
            color: #333;
            padding: 16px 0;
            font-weight: 700;
        }

        .search-form {
            max-width: 630px;
            width: 40%;
            background-color: #f2f3f5;
        }

        .search-form form {
            display: flex;
            border-radius: 4px;
        }

        .search-form input {
            outline: none;
            width: 100%;
            height: 50px;
            padding: 10px 12px;
            background: transparent;
            border: 0;
            border-bottom-left-radius: 4px;
            border-top-left-radius: 4px;
            font-size: 1rem;
        }

        .search-form button {
            width: 50px;
            height: 50px;
            background: transparent;
            border: 0;
            cursor: pointer;
            outline: none;
        }

        .site-top-icons > .nav-icon {
            color: #333;
            font-size: 24px;
        }

        .site-top-icons > .nav-icon > a {
            color: inherit;
        }

        .site-top-icons svg {
            vertical-align: text-bottom;
        }

        .main-header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            height: 70px;
            position: sticky;
            z-index: 2;
            width: 100%;
            background-color: #fff;
        }

        .site-cart {
            position: relative;
        }

        .count {
            position: absolute;
            top: 0;
            right: 0;
            margin-right: -15px;
            margin-top: -12px;
            font-size: 11px;
            width: 20px;
            height: 20px;
            line-height: 21px;
            border-radius: 50%;
            display: block;
            text-align: center;
            background: #ef4f4a;
            color: #fff;
        }

        .menu {
            position: relative;
        }

        .sub-menu, .sub-menu-cart {
            display: none;
            position: absolute;
            background-color: #fff;
            z-index: 999;
            top: 100%;
            padding: 5px 0;
            width: 200px;
            right: 0;
            border: 1px solid #444;
            cursor: auto;
        }

        .sub-menu-cart {
            width: unset;
        }

        .sub-menu .sub-menu-link,.sub-menu-cart .sub-menu-link{
            display: block;
            padding: 0 16px;
            line-height: 32px;
            height: 32px;
            white-space: nowrap;
            color: #555;
            font-size: 14px;
        }


        .site-top-icons .nav-icon:first-of-type:hover > .sub-menu {
            display: block;
        }

        .site-top-icons .nav-icon:last-of-type:hover > .sub-menu-cart {
            display: block;
        }

        .user-name {
            font-size: 18px;
            margin-left: 7px;
            color: #555;
            vertical-align: middle;
        }

        .nav-icon {
            display: inline-block;
            padding: 21px 15px;
            cursor: pointer;
        }
        .btn {
            display: inline-block;
            font-weight: 400;
            text-align: center;
            white-space: nowrap;
            vertical-align: middle;
            cursor: pointer;
            border: 1px solid transparent;
            padding: 4px 15px;
            font-size: 14px;
            line-height: 1.5;
            border-radius: 2px;
        }
        .btn-back {
            padding: 10px 26px;
            color: #fff;
            background-color: #ff6000;
            border-color: #ff6000;
        }

    </style>
  </head>
  <body>
  
  <div class="site-wrap">
   <?php include("./header.php"); ?> 

    <div class="site-section">
      <div class="container">
        <div class="row">
          <div class="col-md-12 text-center">
            <svg xmlns="http://www.w3.org/2000/svg" class="mb-2" viewBox="0 0 512 512" fill="#28a745" width="73"><title>Checkmark Circle</title><path d="M256 48C141.31 48 48 141.31 48 256s93.31 208 208 208 208-93.31 208-208S370.69 48 256 48zm108.25 138.29l-134.4 160a16 16 0 01-12 5.71h-.27a16 16 0 01-11.89-5.3l-57.6-64a16 16 0 1123.78-21.4l45.29 50.32 122.59-145.91a16 16 0 0124.5 20.58z"/></svg>
            <h2 class="display-3 text-black">Gracias!</h2>
            <p class="lead mb-5">Su pedido fue realizado exitosamente.</p>
            <p><a href="home.php" class="btn btn-back">Volver a la tienda</a></p>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="http://localhost/IngWeb/project/assets/js/jquery-3.3.1.min.js"></script>
  <script src="http://localhost/IngWeb/project/assets/js/popper.min.js"></script>
  <script src="http://localhost/IngWeb/project/assets/js/bootstrap.min.js"></script>
  <script src="http://localhost/IngWeb/project/assets/js/main.js"></script>
    
  </body>
</html>