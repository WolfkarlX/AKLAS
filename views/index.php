<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>INICIO</title>
    <link rel="stylesheet" href="css/dashboard_admin.css">
    <link rel="shortcut icon" type="image/x-icon" href="img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <!-- ICONS CDN FONTAWESOME -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
</head>
<body>
    <div class="sidebar">
        <div class="top">
            <div class="logo">
                <i class="bx bx-cross">AKLAS</i>
            </div>
            <i class="bx bx-menu" id="btn_menu"></i>
        </div>
        <ul>
            <li>
                <a href="./">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Inicio</span>
                </a>
                <span class="tooltip">Inicio</span>
            </li>
            <li>
                <a href="./products/">
                    <i class='bx bx-package'></i>
                    <span class="nav-item">Productos</span>
                </a>
                <span class="tooltip">Productos</span>
            </li>
            <li>
                <a href="./suppliers/">
                    <i class='bx bxs-hand'></i>
                    <span class="nav-item">Proveedores</span>
                </a>
                <span class="tooltip">Proveedor</span>
            </li>
            <li>
                <a href="./categories/">
                    <i class='bx bx-category'></i>
                    <span class="nav-item">Categorías</span>
                </a>
                <span class="tooltip">Categorías</span>
            </li>
            <li>
                <a href="./tags/">
                    <i class='bx bx-purchase-tag-alt'></i>
                    <span class="nav-item">Tags</span>
                </a>
                <span class="tooltip">Tags</span>
            </li>
            <li>
                <a href="./areas/">
                    <i class='bx bx-area'></i>
                    <span class="nav-item">Áreas</span>
                </a>
                <span class="tooltip">Áreas</span>
            </li>
            <li>
                <a href="./help/">
                    <i class='bx bx-question-mark'></i>
                    <span class="nav-item">Ayuda</span>
                </a>
                <span class="tooltip">Ayuda</span>
            </li>
            <li>
                <a href="../controllers/logout.php" id="logout-link">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Cerrar Sesión</span>
                </a>
                <span class="tooltip">Cerrar Sesión</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="arriba">
            <h1>Inicio</h1>
            <div id="clock"></div>
            <div class="arribaopciones">
                <!--<i id="oscuro" class='bx bx-moon' onclick='Oscuro()'></i>
                <i id="claro" class='bx bx-sun' onclick='Claro()'></i>-->
            
                <button id="UsuarioBoton"> <i class='bx bx-user-circle'></i></button>
                <button id="ConfiguracionBoton"> <i class='bx bx-cog' ></i></button>
            </div>
        </div>
        <div class="configuracion_tab" style="display: none" id="config_tab">
        <span>Configuración de la página</span>    
                <div class="btn">
                    <div class="btn__indicator">
                        <div class="btn__icon-container">
                            <i class="btn__icon fa-solid" id="btm_fondoscolor"></i>
                        </div>
                    </div>
                   
                </div>
                <span id="opcion"></span>
        </div>
        <div class="abajo" id="abajo">
            <div class="opcionesmain">
                <input class="buscador" type="text" id="myInput" placeholder="Buscar...">
                <i id="iconobuscador" class='bx bx-search-alt-2'></i>
            </div>
            <div class="gridcontainer" id="gridcontainer">
                    <div class="homebutton">
                        <a href="./products/">
                            <i class='bx bx-package'></i>
                            <span class="bloque-item">Productos<span>
                        </a>
                    </div>
                    <div class="homebutton btn-home">
                        <a href="./suppliers/">
                            <i class='bx bxs-hand'></i>
                            <span class="bloque-item">Proveedor</span>
                        </a>
                    </div>
                    <div class="homebutton">
                        <a href="./categories/">
                            <i class='bx bx-category'></i>
                            <span class="bloque-item">Categorías</span>
                        </a>
                    </div>
                    <div class="homebutton">
                        <a href="./tags/">
                            <i class='bx bx-purchase-tag-alt'></i>
                            <span class="bloque-item">Etiquetas</span>
                        </a>
                    </div>
                    <div class="homebutton">
                        <a href="./areas/">
                            <i class='bx bx-area'></i>
                            <span class="bloque-item">Áreas</span>
                        </a>
                    </div>
                    <div class="homebutton">
                        <a href="./help/">
                            <i class='bx bx-question-mark'></i>
                            <span class="bloque-item">Ayuda</span>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/fun.js" type="module"></script>
<script src="js/moonSun.js" type="module"></script>
</html>