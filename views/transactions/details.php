<?php
    session_start();
    if(empty($_SESSION['user_id'])){
        header("Location:../../");
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Detalles De Transacción</title>
    <link rel="stylesheet" href="../css/transaccion.css">
    <link rel="shortcut icon" type="image/x-icon" href="../img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css" integrity="sha512-1sCRPdkRXhBV2PBLUdRb4tMg1w2YPf37qatUFeS7zlBy7jJI8Lf4VHwWfZZfpXtYSLy85pkm9GaYVYMfw5BC1A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
    <div class="main-content">
        <div class="arriba">
            <h1>Detalles De Transacción</h1>
            <div id="clock"></div>
            <div class="arribaopciones">
                <button id="UsuarioBoton"> <i class='bx bx-user-circle'></i></button>
                <button id="notificacion"> <i class='bx bx-bell' >
                <div class="iconoerror" style="display:none" id="iconoerror">
                    <i class='bx bx-error'></i>
                </div>
                </i></button>
                <button id="ConfiguracionBoton"> <i class='bx bx-cog' ></i></button>
            </div>
        </div>
        <div class="abajo">
            <div class="tienda">
            <div id="opciones">
                <input type="submit" value="Realizar Transacción" form="main-form">
                <input type="button" value="Agregar productos" id="btnAgregarProducto">
                <input type="number" id="nproductos" min="1" max="30" placeholder="Cantidad" value="1">
                <button><a href="./">Volver</a></button>
            </div>
            <form id="main-form">
                <input type="hidden" name="reason" value="<?php echo $_POST['reason'] ?>">
                <select name="producto1" id=""></select>
                <input type="number" name="inputP1" id="" min="1">
                <input type="number" name="outputP1" id="" min="1">
            </form>
            </div>
            <div class="alado">
            
            </div>
            </div>
        </div>
        
    </div>
</body>
<script src="../js/moonSun.js" type="module"></script>
<script src="../js/fun.js" type="module"></script>
</html>