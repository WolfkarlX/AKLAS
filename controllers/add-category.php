<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

use models\category;

$cat = new category();
//Comprueba si hay una peticion POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $name = $_POST["name"];
    $description = $_POST["description"];

    $tabla = $cat->getTable();
    $consult = $cat->getArray($name, $description);

    //Ejecuta la funcion para agregar
    $result = $cat ->insertar($tabla, $consult);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/categories");
}
?>