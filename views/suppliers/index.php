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
            <h1>Home → Suppliers</h1>
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
                            <th>Name</th>
                            <th>Contact</th>
                            <th>Address</th>
                            <th>City</th>
                            <th>Postal Code</th>
                            <th>Country</th>
                            <th>Phone</th>
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
                <h1 class="tituloform">NEW SUPPLIER</h1>
                <input id="Cerrar_form" type="button" value="X" class="CancelX">
            </div>
            <fieldset>
                <label for="first-name">Full Name: </label>
                <input id="first-name" type="text" name="first-name" placeholder="Company" required minlength="2" maxlength="30"/>
                <label for="contact">Contact: </label>
                <input id="contact" type="text" name="contact" placeholder="Manager" required minlength="2" maxlength="50"/>
                <label for="address">Address: </label>
                <input id="address" type="text" name="address" placeholder="Street" required minlength="2" maxlength="100"/>
                <label for="city">City: </label>
                <input id="city" type="text" name="city" placeholder="Town" required minlength="2" maxlength="100"/>
                <label for="cp">Postal Code: </label>
                <input id="cp" type="text" name="cp" pattern="\d{5,}" title="Input at least 5 digits on Postal Code " oninput="this.value = this.value.replace(/[^0-9]/g, '');" placeholder="# Code" required maxlength="25"/>
                <label for="nation">Nationality:</label>
                <input id="nation" type="text" name="nation" placeholder="Region"  required minlength="2" maxlength="100"/>
                <label for="phone">Phone Number: </label>
                <input id="phone" type="text" required name="phone" pattern="\d{8,}" title="Input at least 8 digits on Phone Number" oninput="this.value = this.value.replace(/[^0-9]/g, '');" maxlength="13" placeholder="+..."/>
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