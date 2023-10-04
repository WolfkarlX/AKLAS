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
                $_SESSION['user_id'] = $user['IdKey']; // Almacenamos el ID del usuario en la sesión
                header('Location: ../views/'); // Redireccionamos al panel de control
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
