<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../../");

    }
    
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Proveedores</title>
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
                    <span class="nav-item">Inicio</span>
                </a>
                <span class="tooltip">Inicio</span>
            </li>
            <li>
                <a href="../products/">
                    <i class='bx bx-package'></i>
                    <span class="nav-item">Productos</span>
                </a>
                <span class="tooltip">Productos</span>
            </li>
            <li>
                <a href="../suppliers/">
                    <i class='bx bxs-hand'></i>
                    <span class="nav-item">Proveedor</span>
                </a>
                <span class="tooltip">Proveedor</span>
            </li>
            <li>
                <a href="../categories/">
                    <i class='bx bx-category'></i>
                    <span class="nav-item">Categorias</span>
                </a>
                <span class="tooltip">Categorias</span>
            </li>
            <li>
                <a href="../tags/">
                    <i class='bx bx-purchase-tag-alt'></i>
                    <span class="nav-item">Tags</span>
                </a>
                <span class="tooltip">Tags</span>
            </li>
            <li>
                <a href="../areas/">
                    <i class='bx bx-question-mark'></i>
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
                <a href="../../controllers/logout.php">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Cerrar Sesión</span>
                </a>
                <span class="tooltip">Cerrar Sesión</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="arriba">
            <h1>Inicio → Proveedor</h1>
            <div id="clock"></div>
        </div>
        <div class="abajo">
            <div class="opciones">
                <button class="BotonRegistro" id="btn-registro">Nuevo registro</button>
                <button id="btn-actualizar"><i class='bx bx-refresh'></i></button>
            </div>
            <div class="tabla">
                <table id="vista">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Empresa</th>
                            <th>Manager</th>
                            <th>Dirección</th>
                            <th>Ciudad</th>
                            <th>Código Postal</th>
                            <th>País</th>
                            <th>Teléfono</th>
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
            <div class="formarriba">
                <h1 class="tituloform">Nuevo Proveedor</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <label for="first-name">Empresa: </label>
                <input id="first-name" type="text" name="first-name" placeholder="Nombre" required minlength="2" maxlength="30"/>
                <label for="contact">Manager: </label>
                <input id="contact" type="text" name="contact" placeholder="Nombre" required minlength="2" maxlength="50"/>
                <label for="address">Dirección: </label>
                <input id="address" type="text" name="address" placeholder="Calle" required minlength="2" maxlength="100"/>
                <label for="city">Ciudad: </label>
                <input id="city" type="text" name="city" placeholder="Nombre" required minlength="2" maxlength="100"/>
                <label for="cp">Código Postal: </label>
                <input id="cp" type="text" name="cp" pattern="\d{5,}" title="Ingrese al menos 5 digitos de código postal " oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="# Code" required maxlength="25"/>
                <label for="nation">País:</label>
                <input id="nation" type="text" name="nation" placeholder="Region"  required minlength="2" maxlength="100"/>
                <label for="phone">Teléfono: </label>
                <input id="phone" type="text" required name="phone" pattern="\d{8,}" title="Ingrese al menos 8 digitos en su número " oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="13" placeholder="+..."/>
            </fieldset> 
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
    </div>
</body>
<script src="../js/fun.js" type="module"></script>
<script src="../js/urlSuppliers.js"></script>
<script src="../js/app.js" type="module"></script>
</html>