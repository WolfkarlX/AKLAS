<!DOCTYPE html>
<html lang="en">
<head>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin - Proveedores</title>
    <link rel="stylesheet" href="../css/dashboard_admin.css">
    <script src="../js/vistaProveedores.js" async></script>
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
                <a href="#">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Home</span>
                </a>
                <span class="tooltip">Home</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Categories</span>
                </a>
                <span class="tooltip">Categories</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Products</span>
                </a>
                <span class="tooltip">Products</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Tags</span>
                </a>
                <span class="tooltip">Tags</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">FAQs</span>
                </a>
                <span class="tooltip">FAQ</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Suppliers</span>
                </a>
                <span class="tooltip">Suppliers</span>
            </li>
            <li>
                <a href="#">
                    <i class='bx bxs-home-alt-2'></i>
                    <span class="nav-item">Log Out</span>
                </a>
                <span class="tooltip">Log Out</span>
            </li>
        </ul>
    </div>
    <div class="main-content">
        <div class="arriba">
            <h1>Bienvenid@ </h1>
        </div>
        <div class="abajo">
            <div class="opciones">
                <button onclick="showForm()" class="BotonRegistro">Nuevo registro</button>
            </div>
            <div class="tabla">
                <button id="btn-actualizar">Actualizar</button>
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
            <h1>NUEVO PROVEEDOR</h1>
            <fieldset>
                <label for="first-name">Enter Your First Name: 
                    <input required id="first-name" type="text" name="first name"/></label>
                <label for="last-name">Enter Your Last Name: 
                    <input required id="last-name" type="text" name="last name"/></label>
                <label for="email">Enter Your Email: 
                    <input required id="email" type="email" name="e-mail"/></label>
            </fieldset>
            <input type="submit"  onclick="submitForm()" value="Registrar"/>
            <button onclick="closeForm()" class="Cancelar">Cancelar Registro</button>
        </form>
    </div>
</body>
<script>
    let btn_sidebar = document.querySelector('#btn_menu'); //Guarda una variable del boton del sidebar
    let sidebar = document.querySelector('.sidebar'); //Guarda una variable del div sidebar completo

    btn_sidebar.onclick = function () { //Funcion para abrir sidebar xD
        sidebar.classList.toggle('active'); // C abre
    };
    function showForm() {
      document.getElementById("myForm").style.display = "block";
    }
    function closeForm() {
        document.getElementById("myForm").style.display = "none";
    }
</script>
</html>