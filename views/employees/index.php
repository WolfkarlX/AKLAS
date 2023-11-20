<?php
session_start();
require_once('../../models/conexion.php');
use models\conexion;
$conn = new conexion();

if(empty($_SESSION['user_id']))
{
    header("Location:../../");
}

try {
    // Preparamos la consulta para obtener el usuario por su IDKey
    $consulta = $conn->prepare("SELECT IdKey, Password, rol FROM employees WHERE IdKey = :IdKey");
    $consulta->bindParam(':IdKey', $_SESSION['user_id']);
    $consulta->execute();
    $user = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['rol'] != 'root')
    {
        // Redireccionamos al usuario a la pagina principal en caso de que no sea root
        header('Location: ../');
        exit();
    }
} catch (PDOException $e) {
    // En caso de error, muestra un mensaje de error
    echo "Error de inicio de sesión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/style_root.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <title>Root - Cuentas</title>
</head>
<body>
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
            <h1>Visualización de cuentas</h1>
            <div id="clock"></div>
            <div class="arribaopciones">
                <!--Condicional para poder mostrar solo al root si ir a gestionar los empleados -->
                <?php if($_SESSION['user_id'] == "12345678"){?>   
                   <div class="gesti-boton"><a href="../../">Ir a Inicio</a></div>                        
                <?php } ?>
                <button id="UsuarioBoton"> <i class='bx bx-user-circle'></i></button>
                <button id="notificacion"> <i class='bx bx-bell' ></i></button>
                <button id="ConfiguracionBoton"> <i class='bx bx-cog' ></i></button>
            </div>
        </div>
        
        <div class="user_tab" style="display: none" id="user_tab">
            <span>Usuario</span>
            <div class="usuario">
                <!--Mostramos el nombre de usuario--->
                <span>Nombre:</span> 
                <h4><?php echo $_SESSION['first_name']; ?> <br> <?php echo $_SESSION['last_name']; ?></h4> 
                <span>Número de cuenta:</span>
                <h4><?php echo $_SESSION['user_id']; ?></h4>
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
                
            </div>
        </div>
        <div class="abajo">
            <div class="formulario">
            <form id="form-users" action="../../controllers/register.php" method="POST" class="formusuarios"><!--Ingresamos los valores que llevara la cuenta-->
            <div class="formarriba">
                <h1 class="tituloform" id="title">Nuevo Empleado</h1>
            </div>
            <div class="datos">
            <div class="campo">
            <label>Nombres: </label>
            </div>
            <input type="hidden" class="input-field" id="input1" name="Key" required>
            <div class="campo">
            <input type="text" class="input-field" placeholder="Ingrese los nombres" id="input2" name="FirstName" required>
            </div>
            <div class="campo">
            <label>Apellidos: </label>
            </div>
            <div class="campo">
            <input type="text" class="input-field" id="input3" placeholder="Ingrese el apellido" name="LastName" required>
            </div>
            <div class="campo">
            </div>
            <div class="campo">
            <input type="hidden" class="input-field" id="input6" placeholder="Numero de empleado" name="IdKey" required>
            </div>
            <div class="campo">
            <label>Descripción: </label>
            </div>
            <div class="campo">
            <input type="text" id="input4"  class="input-field" placeholder="Descripción del empleado" name="description">
            </div>
            <div class="campo">
            <label id="Nemail">E-mail: </label>
            </div>
            <div class="campo">
            <input type="text" class="input-field" id="imail" placeholder="Correo electronico" name="email" required>
            </div>
            <div class="campo">
            <label id="secret">Contraseña:</label>
            </div>
            <div class="campo">
            <input type="password" class="input-field" id="passw" placeholder="Ingrese la contraseña" name="password" required>
            </div>
            <div class="campo">
            <label>Confirmar Contraseña: </label>
            </div>
            <div class="campo">
            <input type="password" class="input-field" id="passw1" placeholder="Confirme la contraseña" name="confirm_password" required>
            </div>
            <div class="campo">
            <label>Puesto de Empleado: </label>
            </div>
            <div class="campo">
            <select id="input5" name="puesto">
            <option value="" disabled selected hidden>Seleccione el puesto</option>
            <option value="jefe">Jefe de área</option>
            <option value="empleado">Empleado</option>
            </select>
            </div>
            <input type="submit" value="Crear" id="send" class="submit"><!--Boton para enviar los datos-->
            </div>
            </form>
            </div>
            <div class="alado">
                <div class="opciones">
                    <button id="btn-actualizar" title="Actualizar"><i class='bx bx-refresh'></i></button>
                    <button id="btn-delete" form="form-table" title="Eliminar" disabled><i class='bx bx-trash'></i></button>
                    <button id="btn-edit" title="Editar" disabled><i class='bx bx-pencil'></i></button>
                    <input type="text" id="filter" class="tabla-buscadoruser" placeholder="Buscar usuario "><i id="iconobuscador2" class='bx bx-search-alt-2'></i></input>
                </div>
                <div class="tabla">
                <form id="form-table">
                    <table id="vista">
                        <thead>
                            <tr>
                                <th colspan="1">ID</th>
                                <th>Nombre</th>
                                <th>Apellidos</th>
                                <th>Descripción</th>
                                <th>Rol</th>
                                <th>Num. Cuenta</th>
                                <th>E-mail</th>
                            </tr>
                        </thead>
                        <tbody id="vista-cuerpo">
                            
                        </tbody>
                    </table>
                   
                    </form>
                </div>
            </div>
        </div>
</div>
<div class="difuminado2" id="difuminado2">
   
</body>
<script src="../js/fun.js" type="module"></script>
<script src="../js/moonSun.js" type="module"></script>
<script src="../js/urlEmployees.js"></script>
<script type="module" src="../js/app-employees.js"></script>
</html>