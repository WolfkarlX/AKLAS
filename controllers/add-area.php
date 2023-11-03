<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\area;

$area = new area();
//Comprueba si hay una peticion POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $name = $_POST["name"];
    $racksn = $_POST["racksn"];
    $racksf = $_POST["racksf"];
    $type = $_POST["type"];
    $description = $_POST["description"];

    $tabla = $area->getTable();
    $consult = $area->getArray($name, $racksn, $racksf, $type, $description);

    //Ejecuta la funcion para agregar
    $result = $area ->insertar($tabla, $consult);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/areas");
}
?>