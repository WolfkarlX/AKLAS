<?php

require_once('../models/conexion.php');
use models\conexion;
$conn = new conexion();

// Verificamos si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $IdKey = $_POST['IdKey'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];

    // Consulta SQL para verificar si el email ya existe
    $consulta_verificar_email = $conn->prepare("SELECT COUNT(*) FROM employees WHERE email = :email");
    $consulta_verificar_email->bindParam(':email', $email);
    $consulta_verificar_email->execute();
    $email_existente = $consulta_verificar_email->fetchColumn();
    
    // Comprobamos si el email ya existe
    if($email_existente > 0)
    {
        echo "El correo electrónico ya está registrado. Por favor, use otro.";
    }else
    {
     // Verifica si las contraseñas coinciden
        if ($password === $confirm_password) 
        {
            try {

                // Preparamos la consulta de inserción
                $consulta = $conn->prepare("INSERT INTO employees (FirstName, LastName, Description, IdKey, email, Password) VALUES (:FirstName, :LastName, :description, :IdKey, :email, :password)");

                // Bind de los parámetros
                $consulta->bindParam(':FirstName', $FirstName);
                $consulta->bindParam(':LastName', $LastName);
                $consulta->bindParam(':IdKey', $IdKey);
                $consulta->bindParam(':description', $description);
                $consulta->bindParam(':email', $email);
                
                // ciframos la contraseña
                $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                $consulta->bindParam(':password', $hashed_password);

                // Ejecutamos la consulta
                $consulta->execute();

                // Redireccionamos a la pagina principal (hasta ahora al login porque aun no existe la pagina principal :P)
                header('Location:../index.html');
                exit();
            } catch (PDOException $e) 
            {
                // En caso de error, muestra un mensaje de error
                echo "Error de registro: " . $e->getMessage();
            }
        } else 
        {
            echo "Las contraseñas no coinciden.";
        }
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create acount</title>
</head>
<body>
    
<h1>Create acount</h1>
    <span>You already have an acount? <a href="../index.html">Login</a></span><!--Volver al login-->

    <form action="register.php" method="POST"><!--Ingresamos los valores que llevara la cuenta-->
        <input type="text" class="input-field" placeholder="Enter the name" name="FirstName" required>
        <input type="text" class="input-field" placeholder="Enter the lastname" name="LastName" required>
        <input type="text" class="input-field" placeholder="Enter the worker number" name="IdKey" required>
        <input type="text" class="input-field" placeholder="Enter the worker description" name="description">
        <input type="text" class="input-field" placeholder="Enter the email" name="email" required>
        <input type="password" class="input-field" placeholder="Enter the password" name="password" required>
        <input type="password" class="input-field" placeholder="Confirm the password" name="confirm_password" required>
        <input type="submit" value="Submit"><!--Boton para enviar los datos-->
    </form>

</body>
</html>
