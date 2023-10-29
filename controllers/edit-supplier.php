<?php
session_start();
if(empty($_SESSION['user_id']))
{
    header("Location:../");
}


require_once("../autoload.php");
use models\supplier;
$supp = new supplier();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $id = $_POST["Key"];
    $tabla = $supp->getTable();
    $firstname = $_POST["first-name"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $cp = $_POST["cp"];
    $nation = $_POST["nation"];
    $phone = $_POST["phone"];

    $consult = $supp ->getArray($firstname, $contact, $address, $city, $cp, $nation, $phone); 

    //Ejecuta la funcion para agregar
    $result = $supp ->edit($tabla, $consult, $id);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/suppliers");
}
?>