<?php

require_once('../models/conexion.php');
use models\conexion;
$conn = new conexion();

# Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $IdKey = $_POST['IdKey'];
    $email = $_POST['email'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    # Verifica si las contraseñas coinciden
    if ($password === $confirm_password) 
    {
        try {

            # Prepara la consulta de inserción
            $consulta = $conn->prepare("INSERT INTO employees (FirstName, LastName, IdKey, email, Password) VALUES (:FirstName, :LastName, :IdKey, :email, :password)");

            # Bind de los parámetros
            $consulta->bindParam(':FirstName', $FirstName);
            $consulta->bindParam(':LastName', $LastName);
            $consulta->bindParam(':IdKey', $IdKey);
            $consulta->bindParam(':email', $email);
            
            # ciframos la contraseña
            $hashed_password = password_hash($password, PASSWORD_BCRYPT);
            $consulta->bindParam(':password', $hashed_password);

            # Ejecuta la consulta
            $consulta->execute();

            # Redirecciona a una página de éxito
            header('Location: signin.php');
            exit();
        } catch (PDOException $e) 
        {
            # En caso de error, muestra el mensaje de error
            echo "Error de registro: " . $e->getMessage();
        }
    } else 
    {
        echo "Las contraseñas no coinciden.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Sing In</title>
</head>
<body>
    
<h1>Sign In</h1>
    <span>You already have an acount? <a href="index.html">Login</a></span><!--Volver al login-->

    <form action="signin.php" method="POST"><!--Ingresamos los valores que llevara la cuenta-->
        <input type="text" class="input-field" placeholder="Enter the name" name="FirstName" required>
        <input type="text" class="input-field" placeholder="Enter the lastname" name="LastName" required>
        <input type="text" class="input-field" placeholder="Enter the worker number" name="IdKey" required>
        <input type="text" class="input-field" placeholder="Enter the email" name="email" required>
        <input type="password" class="input-field" placeholder="Enter the password" name="password" required>
        <input type="password" class="input-field" placeholder="Confirm the password" name="confirm_password" required>
        <input type="submit" value="Submit"><!--Boton para enviar los datos-->
    </form>

</body>
</html>
