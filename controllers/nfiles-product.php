<?php

require_once("../autoload.php");

use models\area;
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }


if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $id = $_POST["value"];
    
} else {
    header("Location: ../views/products");
}

$area = new area();
$info = $area->getNfiles($id);
echo json_encode($info);
?>