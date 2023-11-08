<?php
    session_start();// Iniciar la sesión
    if(isset($_SESSION['user_id']))
    {
        header("Location:views/");

    }
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="views/css/loginstyle.css">
    <script src="views/js/loginscript.js" async></script>
    <link rel="shortcut icon" type="image/x-icon" href="views/img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
</head>

<body id="particles-js">
    <div class="text-login">
        <h1>AKLAS</h1>
        <h3>Administrando triunfos</h3>
    </div>
    <div class="container">
        <div class="logo-login">
            <img width="150px" src="views/img/logo.png" >
        </div>
        <div class="form-container">
            <h1>Iniciar sesión</h1>
            <form action="controllers/login.php" method="post" id="MyForm">
                <input type="text" class="input-field" placeholder="Número de cuenta" name="IdKey" maxlength="8" required>
                <input type="password" class="input-field" placeholder="Contraseña" id="contra" name="password" required>
                    <div class="icono"><i class='bx bx-lock-alt' id="togglePassword"></i> </div>
                </input>
                <button type="submit" class="button" value="Iniciar sesión">Iniciar Sesión</button>
            </form>
            <form action=" controllers/forgotpass.php">
              <button type="submit" class="buttonpass" value="Olvide mi pass">Olvidé Mi Contraseña</button>
            </form> dlfvf
        </div>
    </div>
    <div class="copy">
        <span> © 2023, AKLAS Inc.</span>
    </div>
</body>
    <script src="./views/js/loginfun.js" type="module"></script>
    <script src="views/js/particles.min.js"></script>
    <script src="views/js/particles_config.js"></script>
</html>

