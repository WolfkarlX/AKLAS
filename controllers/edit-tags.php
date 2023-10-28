<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\tag;

$tag = new tag();
//Comprueba si hay una peticion POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $id = $_POST["Key"];
    $name = $_POST["name"];
    $description = $_POST["description"];

    $tabla = "tags";
    $consult = array(
    "TagName" => $name,
    "Description" => $description, 
    );

    //Ejecuta la funcion para agregar
    $result = $tag ->edit($tabla, $consult, $id);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/tags");
}
?>