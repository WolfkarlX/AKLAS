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
            <h1>Inicio → Productos</h1>
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
                    <select name="supplier" id="Sproovedor">
                    </select><br>
                </div>
                <div class="campo">
                    <label for="Scate">Categoría: </label><br>
                    <select name="category" id="Scate">
                    </select><br>
                </div>
                <div class="campo">
                    <label for="area">Area: </label><br>
                    <select name="area" id="Sarea">
                    </select><br>
                </div>
                <div class="campo">
                    <label for="RN">n# Rack: </label>
                    <input id="RN" type="number" name="rackn" placeholder="Numero de Rack" required minlength="1" maxlength="30"/>
                </div>
                <div class="campo">
                    <label for="file">Fila Rack: </label>
                    <input id="file" type="number" name="fila" placeholder="Numero De Fila Del Rack" required minlength="1" maxlength="30"/>
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
    <div class="formulario" id="form-editado">
        <form class="formu" id="edit-form" style="display: none;">
            <div class="formarriba">
                <h1 class="tituloform">Editar Categoría</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <input type="hidden" id="input1" name="key">
                <label for="input2">Nombre: </label>
                <input id="input2" type="text" name="name" placeholder="Nombre" required minlength="2" maxlength="30"/>
                <label for="selectS">Proovedor: </label> <br>
                <select name="supplier" id="selectS">
                
                </select><br>
                <label for="selectC">Categoría: </label><br>
                <select name="category" id="selectC">

                </select><br>
                <label for="selectA">Area: </label><br>
                <select name="area" id="selectA">

                </select><br>

                <label for="input6">n# Rack: </label>
                <input id="input6" type="number" name="rackn" placeholder="Numero de Rack" required minlength="1" maxlength="30"/>
                <label for="input7"`>Fila Rack: </label>
                <input id="input7" type="number" name="fila" placeholder="Numero De Fila Del Rack" required minlength="1" maxlength="30"/>
                <label for="input8">Precio: </label>
                <input id="input8" type="text" name="price" placeholder="Precio" required minlength="2" maxlength="30"/>
                <label for="input9">Cantidad: </label>
                <input id="input9" type="number" name="quantity" placeholder="Cantidad" required minlength="2" maxlength="30"/>
                <label for="input12">Cantidad Máxima: </label>
                <input id="input12" type="number" name="max" placeholder="Cantidad maxima" required minlength="2" maxlength="30"/>
                <label for="input11">Cantidad Minima: </label>
                <input id="input11" type="number" name="min" placeholder="Cantidad minima" required minlength="2" maxlength="30"/>
                <label for="input10">Descripción: </label>
                <textarea id="input10" name="description" placeholder="Descripción" minlenght="5" pattern="^[^\s].*$"></textarea>
            </fieldset>
            <input type="submit" value="Registrar" class="submitir" id="submit"/>
            <input type="button" id="Cancelar_registro" value="Cancelar Registro" class="Cancelar">
        </form>
    </div>
    <div id="difuminado"></div>
</body>
<script src="../js/fun.js" type="module"></script>
<script src="../js/urlProducts.js"></script>
<script src="../js/app.js" type="module"></script>
</html>