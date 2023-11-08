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
            <h1>Inicio → Productos</h1>
            <div id="clock"></div>
            <div class="arribaopciones">
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
                            <th>Proovedor</th>
                            <th>Categoría</th>
                            <th>Área</th>
                            <th>Rack</th>
                            <th>Fila</th>
                            <th>Precio</th>
                            <th>Cantidad</th>
                            <th>Descripción</th>
                            <th>Cantidad Míninima</th>
                            <th>Cantidad Máxima</th>
                        </tr>
                    </thead>
                    <tbody id="vista-cuerpo">

                    </tbody>
                </table>
                </form>
            </div>
        </div>
    </div>
    <div class="formularioproducto" id="form-normal">
        <form class="formuproductos" id="myForm" style="display: none;">
            <div class="formarriba">
                <h1 class="tituloform">Nuevo Producto</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <div class="datos">
                <div class="campo">
                    <label for="name">Nombre: </label>
                    <input id="na" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="Sproovedor">Proovedor: </label><br>
                    <select name="supplier" id="Sproovedor" required>
                    </select><br>
                </div>
                <div class="campo">
                    <label for="Scate">Categoría: </label><br>
                    <select name="category" id="Scate" required>
                    </select><br>
                </div>
                <div class="campo">
                    <label for="area">Area: </label><br>
                    <select name="area" id="Sarea" required>
                    </select><br>
                </div>
                <div class="campo">
                    <label for="RN">n# Rack: </label>
                    <input id="RN" type="number" name="rackn" disabled min="1" placeholder="Numero de Rack" required />
                </div>
                <div class="campo">
                    <label for="file">Fila Rack: </label>
                    <input id="file" type="number" name="fila" min="1" disabled placeholder="Numero De Fila Del Rack" required/>
                </div>
                <div class="campo">
                    <label for="price">Precio: </label>
                    <input id="price" type="text" name="price" placeholder="Precio" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="quantity">Cantidad: </label>
                    <input id="quantity" type="number" name="quantity" placeholder="Cantidad" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="max">Cantidad Máxima: </label>
                    <input id="maxq" type="number" name="max" placeholder="Cantidad" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="min">Cantidad Minima: </label>
                    <input id="minq" type="number" name="min" placeholder="Cantidad" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="description">Descripción: </label><br>
                    <textarea id="description" name="description" placeholder="Descripción" minlenght="5" pattern="^[^\s].*$"></textarea>
                </div>
            </div>
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
    </div>

    <div class="formularioproducto" id="form-editado">
        <form class="formuproductos" id="edit-form" style="display: none;">
            <div class="formarriba">
                <h1 class="tituloform">Editar Producto</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <div class="datos">
                <input type="hidden" id="input1" name="key">
                <div class="campo">
                    <label for="input2">Nombre: </label>
                    <input id="input2" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="input3">Proovedor: </label><br>
                    <select name="supplier" id="input3" required>
                    </select><br>
                </div>
                <div class="campo">
                    <label for="input4">Categoría: </label><br>
                    <select name="category" id="input4" required>
                    </select><br>
                </div>
                <div class="campo">
                    <label for="input5">Area: </label><br>
                    <select name="area" id="input5" required>
                    </select><br>
                </div>
                <div class="campo">
                    <label for="input6">n# Rack: </label>
                    <input id="input6" type="number" name="rackn" placeholder="Numero de Rack"  required min="1" />
                </div>
                <div class="campo">
                    <label for="input7">Fila Rack: </label>
                    <input id="input7" type="number" name="fila" placeholder="Numero De Fila Del Rack"  required min="1"/>
                </div>
                <div class="campo">
                    <label for="input8">Precio: </label>
                    <input id="input8" type="text" name="price" placeholder="Precio" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="input9">Cantidad: </label>
                    <input id="input9" type="number" name="quantity" placeholder="Cantidad" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="input12">Cantidad Máxima: </label>
                    <input id="input12" type="number" name="max" placeholder="Cantidad" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="input11">Cantidad Minima: </label>
                    <input id="input11" type="number" name="min" placeholder="Cantidad" required minlength="2" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="input10">Descripción: </label><br>
                    <textarea id="input10" name="description" placeholder="Descripción" minlenght="5" pattern="^[^\s].*$"></textarea>
                </div>
            </div>
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
        <form id="getnrackA" hidden>
            <input type="hidden" id="ar" name="value">
        </form>
    </div>
    <div id="difuminado"></div>
</body>
<script src="../js/fun.js" type="module"></script>
<script src="../js/urlProducts.js"></script>
<script src="../js/app.js" type="module"></script>
<script src="../js/moonSun.js" type="module"></script>
</html>