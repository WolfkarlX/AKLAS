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

    if ($user) 
    {
        if ($user['rol'] != 'root' && $user['rol'] != 'jefe') 
        {
          // Redireccionamos al usuario a la pagina principal en caso de que no sea root
            header('Location: ../');
            exit();
        }
    }
   
} catch (PDOException $e) {
    // En caso de error, muestra un mensaje de error
    echo "Error de inicio de sesión: " . $e->getMessage();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Áreas</title>
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
                    <span class="nav-item">Categorías</span>
                </a>
                <span class="tooltip">Categorías</span>
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
                    <span class="nav-item">Áreas</span>
                </a>
                <span class="tooltip">Áreas</span>
            </li>
            <li>
                <a href="../help/">
                    <i class='bx bx-question-mark'></i>
                    <span class="nav-item">Ayuda</span>
                </a>
                <span class="tooltip">Ayuda</span>
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
            <h1>Inicio → Áreas</h1>
            <div id="clock"></div>
            <div class="arribaopciones">
                <button id="UsuarioBoton"> <i class='bx bx-user-circle'></i></button>
                <button id="ConfiguracionBoton"> <i class='bx bx-cog' ></i></button>
            </div>
        </div>
        <div class="abajo">
            <div class="opciones">
            <button class="BotonRegistro" id="btn-registro" title="Hacer un registro nuevo">Nuevo registro</button>
                <button id="btn-actualizar" title="Actualizar"><i class='bx bx-refresh'></i></button>
                <button id="btn-delete" form="form-table" title="Eliminar" disabled>Eliminar</button>
                <button id="btn-edit" title="Editar" disabled>Editar</button>
                <input type="text" id="filter" class="tabla-buscador" placeholder="Filtrar... "><i id="iconobuscador2" class='bx bx-search-alt-2'></i></input>
                
            </div>
            <div class="tabla">
                <form id="form-table">
                <table id="vista">
                    <thead>
                        <tr>
                            <th>ID</th>
                            <th>Nombre</th>
                            <th>Racks</th>
                            <th>Filas Rack</th>
                            <th>Tipo</th>
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
                <h1 class="tituloform">NUEVA ÁREA</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <label for="name">Nombre: </label>
                <input id="name" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="racksn">Cantidad Total De Racks: </label>
                <input id="racksn" type="number" name="racksn" placeholder="Numero De Racks" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="racksf">Cantidad Total De Filas Por Cada Rack: </label>
                <input id="racksf" type="number" name="racksf" placeholder="Numero De Filas Por Rack" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="tipo">Tipo De Area:</label><br>
                    <select name="type" id="tipo">
                        <option value="BODEGA">BODEGA</option>
                        <option value="STOCK">STOCK</option>
                    </select><br>
                <label for="description">Descripción: </label><br>
                <textarea id="description" name="description" placeholder="Descripción" minlenght="5" pattern="^[^\s].*$"></textarea>
            </fieldset>
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
    </div>
    <div class="formulario" id="form-editado">
        <form class="formu" id="edit-form" style="display: none;">
            <div class="formarriba">
                <h1 class="tituloform">Editar Área</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <input type="hidden" id="input1" name="Key">
                <label for="name">Nombre: </label>
                <input id="input2" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="racksn">Cantidad Total De Racks: </label>
                <input id="input3" type="number" name="racksn" placeholder="Numero De Racks" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="racksf">Cantidad Total De Filas Por Cada Rack: </label>
                <input id="input4" type="number" name="racksf" placeholder="Numero De Filas Por Rack" required minlength="2" maxlength="30" pattern="^[^\s].*$"/>
                <label for="tipo">Tipo De Area:</label><br>
                    <select name="type" id="input5">
                        <option value="BODEGA">BODEGA</option>
                        <option value="STOCK">STOCK</option>
                    </select><br>
                <label for="description">Descripción: </label><br>
                <textarea id="input6" name="description" placeholder="Descripción" minlenght="5" pattern="^[^\s].*$"></textarea>
            </fieldset>
            <input type="submit" value="Editar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar edicion" class="Cancelar">
        </form>
    </div>
    <div id="difuminado"></div>
</body>
<script src="../js/fun.js" type="module"></script>
<script src="../js/urlArea.js"></script>
<script src="../js/app.js" type="module"></script>
</html>