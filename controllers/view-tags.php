<?php

use models\conexion;

    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
    $conn = new conexion();
    $conn ->select()

?>