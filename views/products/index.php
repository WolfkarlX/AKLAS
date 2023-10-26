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
            <h1>Inicio → Productos</h1>
            <div id="clock"></div>
        </div>
        <div class="abajo">
        <div class="opciones">
        <button class="BotonRegistro" id="btn-registro">Nuevo registro</button>
                <button id="btn-actualizar"><i class='bx bx-refresh'></i></button>
                <button id="btn-delete" form="form-table" disabled>Eliminar</button>
                <button id="btn-edit" disabled>Editar</button>
                <input type="text" id="filter" class="tabla-buscador" placeholder="Filtrar... "><i id="iconobuscador2" class='bx bx-search-alt-2'></i></input>
                
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
            <div class="formarriba">
                <h1 class="tituloform">Nuevo Producto</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                
            </fieldset>
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
    </div>
    <div class="formulario">
        <form class="formu" id="edit-form" style="display: none;">
            <div class="formarriba">
                <h1 class="tituloform">Editar Categoria</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <label for="name">Nombre: </label>
                <input id="name" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30"/>
                <label for="description">Descripción: </label><br>
                <textarea id="description" name="description" placeholder="Descripción" minlenght="5"></textarea>
            </fieldset>
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
    </div>
</body>
<script src="../js/fun.js" type="module"></script>
</html>