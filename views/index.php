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
                    <span class="nav-item">Categorias</span>
                </a>
                <span class="tooltip">Categorias</span>
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
                    <span class="nav-item">Areas</span>
                </a>
                <span class="tooltip">Areas</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-question-mark'></i>
                    <span class="nav-item">FAQs</span>
                </a>
                <span class="tooltip">FAQs</span>
            </li>
            <li>
                <a href="../controllers/logout.php">
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
                            <span class="bloque-item">Categorias</span>
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
                            <span class="bloque-item">Secciones</span>
                        </a>
                    </div>
                    <div class="homebutton">
                        <a href="./faqs/">
                            <i class='bx bx-question-mark'></i>
                            <span class="bloque-item">Soporte</span>
                        </a>
                    </div>
            </div>
        </div>
    </div>
</body>
<script src="./js/fun.js" type="module"></script>
</html>