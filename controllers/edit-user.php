<?php
session_start();
require_once('../models/conexion.php');
use models\conexion;
$conn = new conexion();

if(empty($_SESSION['user_id']))
{
    header("Location:../views/");
}

try {
    // Preparamos la consulta para obtener el usuario por su IDKey
    $consulta = $conn->prepare("SELECT IdKey, Password, rol FROM employees WHERE IdKey = :IdKey");
    $consulta->bindParam(':IdKey', $_SESSION['user_id']);
    $consulta->execute();
    $user = $consulta->fetch(PDO::FETCH_ASSOC);

    if ($user && $user['rol'] != 'root')
    {
        // Redireccionamos al usuario a la pagina principal en caso de que no sea root
        header('Location: ../views/');
        exit();
    }
} catch (PDOException $e) {
    // En caso de error, muestra un mensaje de error
    echo "Error de inicio de sesión: " . $e->getMessage();
}


if ($_SERVER['REQUEST_METHOD'] == 'POST') 
{   
    $Id = $_POST["Key"];
    $FirstName = $_POST['FirstName'];
    $LastName = $_POST['LastName'];
    $IdKey = $_POST['IdKey'];
    $email = $_POST['email'];
    $description = $_POST['description'];
    $password = $_POST['password'];
    $confirm_password = $_POST['confirm_password'];
    $rol = $_POST['puesto'];

    // Consulta SQL para verificar si el email ya existe
    $consulta_verificar_email = $conn->prepare("SELECT COUNT(*) FROM employees WHERE email = :email");
    $consulta_verificar_email->bindParam(':email', $email);
    $consulta_verificar_email->execute();
    $email_existente = $consulta_verificar_email->fetchColumn();

    // Comprobamos si el email ya existe
    if($email_existente > 0)
    {
        echo "<script>
            alert('Este email ya esta registrado. Por favor utilize otro');
            window.location.href = '../views/employees/';
        </script>";
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
                    $consulta = $conn->prepare("UPDATE employees SET FirstName = :FirstName,  LastName = :LastName, Description = :description, email = :email, Password = :password, rol = :rol WHERE EmployeID = :Key");
    
                    // Bind de los parámetros
                    $consulta->bindParam(':FirstName', $FirstName);
                    $consulta->bindParam(':LastName', $LastName);
                    $consulta->bindParam(':description', $description);
                    $consulta->bindParam(':email', $email);
                    $consulta->bindParam(':rol', $rol);
                    $consulta->bindParam(':Key', $Id);

                    
                    // ciframos la contraseña
                    $hashed_password = password_hash($password, PASSWORD_BCRYPT);
                    $consulta->bindParam(':password', $hashed_password);
    
                    // Ejecutamos la consulta
                    $consulta->execute();
    
                    // Redireccionamos a la pagina principal
                    echo "<script>
                        alert('Cuenta Editada correctamente');
                        window.location.href = '../views/employees/';
                    </script>";
                    exit();
                } catch (PDOException $e) 
                {
                    // En caso de error, muestra un mensaje de error
                    echo "Error de registro: " . $e->getMessage();
                    header('Location:../views/employees/');
                }
            }else
            {
                echo "<script>alert('La contraseña es demasiado corta (debe tener al menos 6 caracteres)');
                window.location.href = '../views/employees/'
                </script>";  

            }
            
        } else 
        {
            echo "<script>
            alert('Las contraseñas no coinciden.');
            window.location.href = '../views/employees/'
            </script>";
            
        }
    }
}
?>