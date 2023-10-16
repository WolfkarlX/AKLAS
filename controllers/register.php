<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../views/");

    }
    if ($_SESSION['user_id'] != 12345678) {
        header('Location: ../');
    }
?>

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

    // Consulta SQL para verificar si el IdKey ya existe
    $consulta_verificar_IdKey = $conn->prepare("SELECT COUNT(*) FROM employees WHERE IdKey = :IdKey");
    $consulta_verificar_IdKey->bindParam(':IdKey', $IdKey);
    $consulta_verificar_IdKey->execute();
    $IdKey_existente = $consulta_verificar_IdKey->fetchColumn();
    
    // Comprobamos si el email ya existe
    if($email_existente > 0)
    {
        echo "<script>alert('Este email ya esta registrado. Por favor utilize otro');</script>";
    }
    // Comprobamos si el IdKey ya existe
    else if($IdKey_existente > 0)
    {
        echo "<script>alert('Numero de trabajador ya en uso.');</script>";
    }
    else
    {
     // Verifica si las contraseñas coinciden
        if ($password === $confirm_password) 
        {
            if(strlen($password) >= 6)
            {
                try 
                {

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
    
                    // Redireccionamos a la pagina principal
                    echo "<script>alert('Cuenta creada correctamente');</script>";
                    header('Location:register.php');
                    exit();
                } catch (PDOException $e) 
                {
                    // En caso de error, muestra un mensaje de error
                    echo "Error de registro: " . $e->getMessage();
                }
            }else
            {
                echo "<script>alert('La contraseña es demasiado corta (debe tener al menos 6 caracteres)');</script>";
            }
            
        } else 
        {
            echo "<script>alert('Las contraseñas no coinciden.');</script>";
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
    <span><a href="logout.php">Log out</a></span><!--Volver al login-->

    <form action="register.php" method="POST"><!--Ingresamos los valores que llevara la cuenta-->
        <input type="text" class="input-field" placeholder="Ingrese el nombre" name="FirstName" required>
        <input type="text" class="input-field" placeholder="Ingrese el apellido" name="LastName" required>
        <input type="text" class="input-field" placeholder="Numero de empleado" name="IdKey" required>
        <input type="text" class="input-field" placeholder="Descripción del empleado" name="description">
        <input type="text" class="input-field" placeholder="Correo electronico" name="email" required>
        <input type="password" class="input-field" placeholder="Ingrese la contraseña" name="password" required>
        <input type="password" class="input-field" placeholder="Confirme la contraseña" name="confirm_password" required>
        <input type="submit" value="Crear"><!--Boton para enviar los datos-->
    </form>

</body>
</html>