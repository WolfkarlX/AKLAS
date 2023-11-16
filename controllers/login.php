<?php
    session_start();// Iniciar la sesión
    if(isset($_SESSION['user_id']))
    {
        header("Location:../views/index.php");

    }
?>

<?php

require_once('../models/conexion.php');
use models\conexion;
$conn = new conexion();


// Verifica si se envió el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{
    $IdKey = $_POST['IdKey'];
    $password = $_POST['password'];

    try {
        // Preparamos la consulta para obtener el usuario por su IDKey
        $consulta = $conn->prepare("SELECT EmployeID, IdKey, LastName, FirstName, Password, rol FROM employees WHERE IdKey = :IdKey");
        $consulta->bindParam(':IdKey', $IdKey);
        $consulta->execute();
        $user = $consulta->fetch(PDO::FETCH_ASSOC);

        if ($user) 
        {
            // Verificamos si la contraseña ingresada coincide con la almacenada en la base de datos
            if (password_verify($password, $user['Password'])) 
            {
                $_SESSION['user_id'] = $user['IdKey']; // Almacenamos el ID del usuario en la sesión
                $_SESSION['first_name'] = $user['FirstName']; // Almacenamos el FirtsName del usuario en la sesión
                $_SESSION['last_name'] = $user['LastName']; // Almacenamos el LastName del usuario en la sesión
                $_SESSION['EmployeID'] = $user['EmployeID'];
                if ($user['rol'] == 'root') 
                {
                    header('Location: ../views/employees/');//Redirigimos al panel de control del root
                } else 
                {
                    header('Location: ../views/'); // Redireccionamos al panel de control
                }
                exit();
            } else 
            {
            echo "<script>alert('Contraseña incorrecta.'); window.history.back();</script>";
            }
        } else 
        {
            echo "<script>alert('Los datos ingresados son incorrectos.'); window.history.back();</script>";
        }
    } catch (PDOException $e) {
        // En caso de error, muestra un mensaje de error
        echo "Error de inicio de sesión: " . $e->getMessage();
    }
}
?>
