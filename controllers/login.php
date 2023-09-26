<?php //Hasta ahora el login no funciona
session_start(); // Iniciar la sesión
require_once('../models/conexion.php');
use models\conexion;
$conn = new conexion();


// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $IdKey = $_POST['IdKey'];
    $password = $_POST['password'];

    try {
        // Preparamos la consulta para obtener el usuario por su IDKey
        $consulta = $conn->prepare("SELECT IdKey, Password FROM employees WHERE IdKey = :IdKey");
        $consulta->bindParam(':IdKey', $IdKey);
        $consulta->execute();
        $user = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($user) {
            // Verificamos si la contraseña ingresada coincide con la almacenada en la base de datos
            if (password_verify($password, $user['Password'])) 
            {
                $_SESSION['user_id'] = $user['Idkey']; // Almacenamos el ID del usuario en la sesión
                header('Location: suppliers.php'); // Redireccionamos al panel de control
                exit();
            } else {
                echo "Contraseña incorrecta.";
            }
        } else {
            echo "Usuario no encontrado.";
        }
    } catch (PDOException $e) {
        // En caso de error, muestra un mensaje de error
        echo "Error de inicio de sesión: " . $e->getMessage();
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href="../views/css/loginstyle.css">
    <script src="../views/js/loginscript.js" async></script>
    <link rel="shortcut icon" type="image/x-icon" href="../views/img/favicon.ico.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap" rel="stylesheet">
</head>

<body>
    <div class="text-login">
        <h1>AKLAS</h1>
        <h3>Administrando triunfos</h3>
        <!--<h3>triunfos</h3>-->
    </div>
    <div class="container">
        <div class="logo-login">
            <img width="150px" src="../views/img/inventary.png" >
        </div>
        <div class="form-container">
            <h1>Iniciar sesión</h1>
            <form action="login.php" method="POST">
                <input type="text" class="input-field" placeholder="Enter the worker number" name="IdKey" required>
                <input type="password" class="input-field" placeholder="Enter the password" name="password" required>
                <input type="submit" value="Login">
            </form>
        </div>
        
    </div>
</body>

</html>
