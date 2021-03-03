<header id="header" class="header">
        <div class="container">
            <div class="main-header">
                <div class="site-logo">
                    <a href="home.php" class="scroll-link">TECH SHOP</a>
                </div>
                <div class="search-form">
                    <form action="home.php" method="get" class="search">
                        <input type="text" placeholder="Buscar producto" name="search_box" value="<?php echo $_GET['search_box']??"" ?>" id="search-box">
                        <button type="submit">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="22"><path d="M221.09 64a157.09 157.09 0 10157.09 157.09A157.1 157.1 0 00221.09 64z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-miterlimit="10" stroke-width="32" d="M338.29 338.29L448 448"/></svg>
                        </button>
                    </form>
                </div>
                <div class="site-top-icons">
                    <div class="nav-icon">
                    <?php  if(!(isset($_SESSION['login']) && $_SESSION['login'])) echo '<a href="login.php" class="icon__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="26"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg></a>';
                    else echo '<span class="icon__item">
                    <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="26"><path d="M344 144c-3.92 52.87-44 96-88 96s-84.15-43.12-88-96c-4-55 35-96 88-96s92 42 88 96z" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path d="M256 304c-87 0-175.3 48-191.64 138.6C62.39 453.52 68.57 464 80 464h352c11.44 0 17.62-10.48 15.65-21.4C431.3 352 343 304 256 304z" fill="none" stroke="currentColor" stroke-miterlimit="10" stroke-width="32"/></svg><span class="user-name">'.$_SESSION["userData"]["nombre"].'</span></span>
                    <ul class="sub-menu">
                        <li><a href="account.php" class="sub-menu-link">Mi cuenta</a></li>
                        <li><a href="../../controllers/logout.php" class="sub-menu-link">Cerrar sesion</a></li>
                    </ul>'?>
                    </div>
                    <div class="nav-icon" id="icon_cart">
                        <a href="<?php if(isset($_SESSION['login']) && $_SESSION['login']) echo'cart.php'; else echo 'login.php';?>" class="site-cart">
                            <svg xmlns="http://www.w3.org/2000/svg" class="ionicon" viewBox="0 0 512 512" width="26"><circle cx="176" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><circle cx="400" cy="416" r="16" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/><path fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32" d="M48 80h64l48 272h256"/><path d="M160 288h249.44a8 8 0 007.85-6.43l28.8-144a8 8 0 00-7.85-9.57H128" fill="none" stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="32"/></svg>
                            <?php
                                if ((isset($_SESSION['login'])) && $_SESSION['login'] && (isset($_SESSION['carrito']))){
                                    $count = count($_SESSION['carrito']);
                                    echo "<span class='count'>$count</span>";
                                }
                            ?>
                        </a><?php if(!(isset($_SESSION['login']) && $_SESSION['login'])) echo                     '<ul class="sub-menu-cart">
                            <li class="sub-menu-link">No has iniciado sesion. <a href="login.php">Inicia sesion</a></li>
                        </ul>';?>
                    </div>
                </div>
            </div>
        </div>
    </header>