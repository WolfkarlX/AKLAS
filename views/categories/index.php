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
    <title>Categorías</title>
    <link rel="stylesheet" href="../css/dashboard_admin.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

</head>
</head>
<body>
    <div class="sidebar" id="sidebarid">
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
                <a href="../dashboard/">
                    <i class='bx bxs-doughnut-chart'></i>
                    <span class="nav-item">Dashboard</span>
                </a>
                <span class="tooltip">Dashboard</span>
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
                    <span class="nav-item">Categorías</span>
                </a>
                <span class="tooltip">Categorías</span>
            </li>
            <li>
                <a href="../transactions/">
                    <i class='bx bx-cylinder'></i>
                    <span class="nav-item">Transacciones</span>
                </a>
                <span class="tooltip">Transacciones</span>
            </li>
            <li>
                <a href="../tags/">
                    <i class='bx bx-purchase-tag-alt'></i>
                    <span class="nav-item">Etiquetas</span>
                </a>
                <span class="tooltip">Etiquetas</span>
            </li>
            <li>
                <a href="../areas/">
                    <i class='bx bx-area'></i>
                    <span class="nav-item">Áreas</span>
                </a>
                <span class="tooltip">Áreas</span>
            </li>
            <li>
                <a href="../help/">
                    <i class='bx bx-question-mark'></i>
                    <span class="nav-item">Ayuda y Privacidad</span>
                </a>
                <span class="tooltip">Ayuda y Privacidad</span>
            </li>
            <li>
                <a href="../../controllers/logout.php" id="logout-link">
                    <i class='bx bx-log-out'></i>
                    <span class="nav-item">Cerrar Sesión</span>
                </a>
                <span class="tooltip">Cerrar Sesión</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="arriba">
            <h1>Categorías</h1>
            <div id="clock"></div>
            <div class="arribaopciones">
                <button id="UsuarioBoton"> <i class='bx bx-user-circle'></i></button>
                <button id="notificacion"> <i class='bx bx-bell' >
                <div class="iconoerror" style="display:none" id="iconoerror">
                    <i class='bx bx-error'></i>
                </div>
                </i></button>
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
        <div class="user_tab" style="display: none" id="user_tab">
            <span>Usuario</span>
            <div class="usuario">
                <span><?php echo $_SESSION['first_name']; ?> <?php echo $_SESSION['last_name']; ?></span><!--Mostramos el nombte de usuario--->
            </div>
            <div class="user-boton">
            <a href="../../controllers/logout.php" id="logout-link2">
                    <i class='bx bx-log-out'></i>
                    <span>Cerrar Sesión</span>
                </a>
            </div>
        </div>
        <div class="notif_tab" style="display: none" id="notif_tab">
            <span>Notificaciones</span>
            <div class="Notif">
                <span>Ejemplo</span>
            </div>
        </div>
        <div class="abajo">
        <div class="opciones">
        <button class="BotonRegistro" id="btn-registro" title="Hacer un registro nuevo">Nuevo registro</button>
                <button id="btn-actualizar" title="Actualizar"><i class='bx bx-refresh'></i></button>
                <button id="btn-delete" form="form-table" title="Eliminar" disabled><i class='bx bx-trash'></i></button>
                <button id="btn-edit" title="Editar" disabled><i class='bx bx-pencil'></i></button>
                <input type="text" id="filter" class="tabla-buscador" placeholder="Filtrar... "><i id="iconobuscador2" class='bx bx-search-alt-2'></i></input>
                
        </div>
            <div class="tabla">
                <form id="form-table">
                    <table id="vista">
                        <thead>
                            <tr>
                                <th>ID</th>
                                <th>Nombre</th>
                                <th>Descripción</th>
                            </tr>
                        </thead>
                        <tbody id="vista-cuerpo">

                        </tbody>
                    </table>
                </form>
            </div>
        </div>
    </div>
    
    <div class="formulario" id="form-normal">
        <form class="formu" id="myForm" style="display: none;">
            <div class="formarriba">
                <h1 class="tituloform">NUEVA CATEGORÍA</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <label for="name">Nombre: </label>
                <input id="name" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="description">Descripción: </label><br>
                <textarea id="description" class="textarea-categori" name="description" placeholder="Descripción" minlenght="5" pattern="^[^\s].*$"></textarea>
            </fieldset>
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
    </div>
    <div class="formulario" id="form-editado">
        <form class="formu" id="edit-form" style="display: none;">
            <div class="formarriba">
                <h1 class="tituloform">Editar Categoría</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <input id="input1" type="hidden" name="Key">
                <label for="name">Nombre: </label>
                <input id="input2" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="description">Descripción: </label><br>
                <textarea id="input3" class="textarea-categori" name="description" placeholder="Descripción" minlenght="5" pattern="^[^\s].*$"></textarea>
            </fieldset>
            <input type="submit" value="Editar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar edicion" class="Cancelar">
        </form>
    </div>
    <div id="difuminado"></div>
</body>
<script src="../js/fun.js" type="module"></script>
<script src="../js/urlCategories.js"></script>
<script src="../js/app.js" type="module"></script>
<script src="../js/moonSun.js" type="module"></script>
</html>