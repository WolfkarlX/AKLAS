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

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $id = $_POST["Key"];
    $name = $_POST["name"];
    $description = $_POST["description"];

    $tabla = "categories";
    $consult = array(
    "CategoryName" => $name,
    "Description" => $description, 
    );

    //Ejecuta la funcion para agregar
    $result = $cat ->edit($tabla, $consult, $id);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/tags");
}
?>