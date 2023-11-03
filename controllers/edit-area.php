<?php

session_start();
if(empty($_SESSION['user_id']))
{
    header("Location:../");
}

require_once("../autoload.php");

use models\area;

$area = new area();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $id = $_POST["Key"];
    $name = $_POST["name"];
    $racksn = $_POST["racksn"];
    $racksf = $_POST["racksf"];
    $type = $_POST["type"];
    $description = $_POST["description"];

    $tabla = $area->getTable();
    $consult = $area->getArray($name, $racksn, $racksf, $type, $description);

    //Ejecuta la funcion para agregar
    $result = $area ->edit($tabla, $consult, $id);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/areas");
}
?>