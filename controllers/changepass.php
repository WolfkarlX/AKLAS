<?php

require_once('../models/conexion.php');
use models\conexion;
$conn = new conexion();

if(isset($_POST['check-email']))
{
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $check_email = "SELECT * FROM employees WHERE email='$email'";
    $run_sql = mysqli_query($con, $check_email);
    if(mysqli_num_rows($run_sql) > 0)
    {
        $code = rand(999999, 111111); 
        $insert_code = "UPDATE employees SET code = $code WHERE email = '$email'";
        $run_query =  mysqli_query($con, $insert_code);
        if($run_query)
        {
            $subject = "Codigo para cambiar contraseña";
            $message = "Tu codigo para cambiar tu contraseña es este: $code";
            $sender = "From: proyectos0903@gmail.com";
            if(mail($email, $subject, $message, $sender))
            {
                $info = "Hemos enviado un codigo a tu correo electronico para el cambio de contraseña - $email";
                $_SESSION['info'] = $info;
                $_SESSION['email'] = $email;
                header('location: passchange.php');
                exit();
            }else
            {
                $errors['otp-error'] = "¡Error al enviar el codigo!";
            }
        }else
        {
            $errors['db-error'] = "¡Algo salio mal!";
        }
    }else
    {
        $errors['email'] = "¡Esta dirección de correo electrónico no existe!"; 
    }
}

?>
