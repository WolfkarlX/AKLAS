<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

use models\product;

$produc = new product();
//Comprueba si hay una peticion POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $name = $_POST["name"];
    $supplier = $_POST["supplier"];
    $category = $_POST["category"];
    $area = $_POST["area"];
    $rackn = $_POST["rackn"];
    $file = $_POST["fila"];
    $price = $_POST["price"];
    $quantity = $_POST["quantity"];
    $max = $_POST["max"];
    $min = $_POST["min"];
    $description = $_POST["description"];

    $tabla = $produc->getTable();
    $consult = $produc->getArray($name, $supplier, $category, $area, $rackn, $file, $price, $quantity, $description, $min, $max);

    //Ejecuta la funcion para agregar
    $result = $produc ->insertar($tabla, $consult);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/products");
}
?>