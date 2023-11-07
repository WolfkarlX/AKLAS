<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Reestablecer Contraseña</title>
    <link rel="stylesheet" href="../views/css/loginstyle.css">
    <script src="../views/js/loginscript.js" async></script>
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
            <img width="150px" src="../views/img/inventary.png" >
        </div>
    <div class="form-container">
        <h1>Ingrese su correo</h1>
        <form action="changepass.php" method="post" id="MyForm">
            <input type="text" class="input-field" placeholder="Ingrese su email" name="email" required>
            <button type="submit" class="button" value="Enviar Correo">Enviar correo</button>
             
        </form>
        <form action="../index.php">
            <button class="volver" value="Volver">Volver</button> 
        </form> 
        </div>
    </div>
    <div class="copy">
        <span> © 2023, AKLAS</span>
    </div>
</body>
<script src="../views/js/loginfun.js" type="module"></script>
    <script src="../views/js/particles.min.js"></script>
    <script src="../views/js/particles_config.js"></script>
</html>