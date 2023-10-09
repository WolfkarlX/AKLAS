<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Productos</title>
    <link rel="stylesheet" href="../css/dashboard_admin.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico.png">
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
                <a href="../">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="../products/">
                    <i class='bx bx-package'></i>
                    <span class="nav-item">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href="../suppliers/">
                    <i class='bx bxs-hand'></i>
                    <span class="nav-item">Suppliers</span>
                </a>
                <span class="tooltip">Suppliers</span>
            </li>
            <li>
                <a href="../categories/">
                    <i class='bx bx-category'></i>
                    <span class="nav-item">Categories</span>
                </a>
                <span class="tooltip">Categories</span>
            </li>
            <li>
                <a href="../tags/">
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
                <a href="../../controllers/logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="arriba">
            <h1>Home>Products</h1>
        </div>
        <div class="abajo">
            <div class="opciones">
                <button onclick="showForm()" class="BotonRegistro">Nuevo registro</button>
                <button id="btn-actualizar"><i class='bx bx-refresh'></i></button>
            </div>
            <div class="tabla">
                <table id="vista">
                    <thead>
                        <tr>
                            
                        </tr>
                    </thead>
                    <tbody id="vista-cuerpo">

                    </tbody>
                </table>
            </div>
        </div>
    </div>
    <div class="formulario">
        <form class="formu" id="myForm" style="display: none;">
            <h1>NUEVO PRODUCTO</h1>
            <fieldset>
                
            </fieldset>
            <input type="submit" value="Registrar"/>
            <input type="button" value="Cancelar Registro" class="Cancelar" onclick="closeForm()">
        </form>
    </div>
</body>
<script src="../js/fun.js" type="module"></script>
</html>