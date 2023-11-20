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
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda y Privacidad</title>
    <link rel="stylesheet" href="../css/dashboard_admin.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />

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
                <button class="cerrarmenu" id="cerrarcosa">Guardar</button>
        </div>
        
    <div class="main-content">
        <div class="arriba">
            <h1>Ayuda y Privacidad</h1>
            <div id="clock"></div>
            <div class="arribaopciones">
                <!--Condicional para poder mostrar solo al root si ir a gestionar los empleados -->
                <?php if($_SESSION['user_id'] == "12345678"){?>   
                   <div class="gesti-boton"><a href="../employees/">Gestionar Empleados<br></a></div>                        
                <?php } ?>
                <button id="UsuarioBoton"> <i class='bx bx-user-circle'></i></button>
                <button id="ConfiguracionBoton"> <i class='bx bx-cog' ></i></button>
            </div>
        </div>
        <div class="user_tab" style="display: none" id="user_tab">
            <span>Usuario</span>
            <div class="usuario">
                <!--Mostramos el nombre de usuario--->
                <span>Nombre:</span> <br>
                <h4><?php echo $_SESSION['first_name']; ?> <br> <?php echo $_SESSION['last_name']; ?></h4> <br>
                <span>Número de cuenta:</span><br>
                <h4><?php echo $_SESSION['user_id']; ?></h4><br>
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
        <div class="abajo" id="abajo">
            <!--<div class="opcionesmain">
                <input class="buscador" type="text" id="myInput" placeholder="Buscar...">
                <i id="iconobuscador" class='bx bx-search-alt-2'></i>
            </div>-->
            <div class="logo-help">
                <div><h2><i><strong>PRIVACIDAD</strong></i><br></h2></div>
                <img src="../img/logo.png" width="140" height="" alt="Logo AKLAS" title="Logo de AKLAS"/>
                <br><br>
                <i><strong>Copyright 2023, AKLAS, administrando triunfos, todos losderechos reservados</strong></i><br>
                <strong>Contacto: <a href="mailto:aklas@gmail.com" title="Enviar correo a AKLAS">aklas@gmail.com</a></strong><br><br>
                <i>
                    Los datos personales recabados serán protegidos, incorporados y tratados en el <strong>Sistema de Datos Personales</strong> 
                    correspondiente, de conformidad con lo dispuesto por la <strong>Ley Federal de Transparencia y la Ley Federal de 
                    Protección de Datos Personales en Posesión de los Particulares</strong>. Dichos datos se recaban con conocimiento 
                    de los empleados de AKLAS: GESTIÓN DE ALMACÉN E INVENTARIO, de quienes se recopila el nombre, correo electrónico, 
                    dirección, teléfono y fecha de nacimiento. La Unidad Administrativa responsable del Sistema de datos personales 
                    es la <strong>Dirección General Adjunta de Aklas</strong>, el interesado podrá ejercer los derechos de acceso, rectificación, 
                    corrección, oposición y cancelación de sus datos a través del <strong>SISTEMA DE ATENCIÓN AL EMPLEADO de AKLAS,</strong> 
                    esto <a href="../../controllers/forgotpass.php?" title="Enviar correo"> HACIENDO CLICK AQUÍ</a>,
                    donde se deberá dirigir para enviar su solicitud si desea dar de baja sus datos del registro correspondiente.
                </i><br><br>
                <i>
                    Si tiene alguna duda o comentario, puede contactar directamente a la Ing. Karla Ramírez Marquéz, al correo 
                    <a href="mailto:kramirez32@ucol.mx" title="Enviar correo a la Ing. Karla Ramírez Marquéz">kramirez32@ucol.mx</a> 
                    o al número telefónico: 314 352 0638, de igual manera puede asistir de forma presencial a la dirección general de la 
                    <strong>Facultad de Ingeniería Electromecánica</strong> en el domicilio El Naranjo, Carretera Manzanillo-Cihuatlan Km. 20, 
                    28860 Manzanillo, Colima. Teléfono: 314 331 1207.
                </i>

            </div>
        </div>
    </div>
    <div class="difuminado2" id="difuminado2">
</body>
    <script src="../js/fun.js" type="module"></script>
    <script src="../js/moonSun.js" type="module"></script>
</html>