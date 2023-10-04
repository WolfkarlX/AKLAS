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
    <title>HOME</title>
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
                    <span class="nav-item">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="./products/">
                    <i class='bx bx-package'></i>
                    <span class="nav-item">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href="./suppliers/">
                    <i class='bx bxs-hand'></i>
                    <span class="nav-item">Suppliers</span>
                </a>
                <span class="tooltip">Suppliers</span>
            </li>
            <li>
                <a href="./categories/">
                    <i class='bx bx-category'></i>
                    <span class="nav-item">Categories</span>
                </a>
                <span class="tooltip">Categories</span>
            </li>
            <li>
                <a href="./tags/">
                    <i class='bx bx-purchase-tag-alt'></i>
                    <span class="nav-item">Tags</span>
                </a>
                <span class="tooltip">Tags</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bx-question-mark'></i>
                    <span class="nav-item">FAQs</span>
                </a>
                <span class="tooltip">FAQ</span>
            </li>
            <li>
                <a href="../controllers/logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="arriba">
            <h1>Home</h1>
        </div>
        <div class="abajo">
            <h2>Contenido</h2>
        </div>
    </div>
</body>
<script>
    let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
    let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo

    btn_sidebar.onclick = function () { //Funcion para abrir sidebar xD
        sidebar.classList.toggle('active'); // C abre
    };
</script>
</html>