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
    <div class="container">
    <div class="form-content">
        <h1>Enviar Correo</h1>
        <form action="https://formsubmit.co/lramirez68@ucol.mx" method="POST">
            <label for="Numero_Cuenta">Número de cuenta</label>
            <input name="Numero_Cuenta" id="Numero_Cuenta" type="number" class="input-field" min="1" pattern="^[0-9]+" placeholder="Ingrese su número de cuenta" required>
            
            <label for="email">E-mail</label>
            <input name="email" id="email" type="email" class="input-field" placeholder="Ingrese su correo" required>

            <label for="coments">Comentario</label>
            <textarea name="coments" id="coments" cols="30" rows="5" class="input-field" required></textarea>

            <input type="submit" class="button" value="Enviar Correo">
             
            <input type="hidden" name="_next" value="http://localhost/AKLAS/controllers/forgotpass.php?">

            <input type="hidden" name="_captcha" value="false">
        </form>
        <form action="../index.php">
            <button class="volver" value="Volver">Volver</button> 
        </form> 
    </div>
    </div>
    <div class="copy">
        <span> © Copyright 2023, AKLAS Inc. Administrando triunfos, todos los derechos reservados</span>
    </div>
</body>
<script src="../views/js/loginfun.js" type="module"></script>
    <script src="../views/js/particles.min.js"></script>
    <script src="../views/js/particles_config.js"></script>
</html>