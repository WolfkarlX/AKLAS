<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ayuda</title>
    <link rel="stylesheet" href="../views/css/ayuda.css">
    <link rel="shortcut icon" type="image/x-icon" href="../views/img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
</head>
<body id="particles-js">
    <div class="text-login">
        <h1>AKLAS</h1>
        <h3>Administrando triunfos</h3>
    </div>
        <!--<div class="logo-login">
            <img width="150px" src="../views/img/logo.png" >
        </div>-->
    <div class="form-content">
        <h1>Enviar Correo</h1>
        <form action="https://formsubmit.co/kramirez32@ucol.mx" method="POST">
            <label for="name">Nombre</label>
            <input name="name" id="name" type="text" class="input-field" placeholder="Ingrese su nombre" required>
            
            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" class="input-field" placeholder="Ingrese su correo" required>

            <label for="subject">Asunto</label>
            <input name="subject" id="subject" type="text" class="input-field" placeholder="Ingrese el asunto" required>

            <label for="coments">Comentario</label>
            <textarea name="coments" id="coments" cols="30" rows="5" class="input-field"></textarea>

            <input type="submit" class="button" value="Enviar Correo">
             
            <input type="hidden" name="_next" value="http://localhost/AKLAS/controllers/forgotpass.php?">

            <input type="hidden" name="_captcha" value="false">
        </form>
        <form action="../index.php">
            <button class="volver" value="Volver">Volver</button> 
        </form> 
    </div>
    <div class="copy">
        <span> © 2023, AKLAS Inc.</span>
    </div>
</body>
<script src="../views/js/loginfun.js" type="module"></script>
    <script src="../views/js/particles.min.js"></script>
    <script src="../views/js/particles_config.js"></script>
</html>