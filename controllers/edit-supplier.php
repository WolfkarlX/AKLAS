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
    $tabla = "suppliers";
    $firstname = $_POST["first-name"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $cp = $_POST["cp"];
    $nation = $_POST["nation"];
    $phone = $_POST["phone"];

    $consult = array(
        "SupplierName" => $firstname,
        "ContactName"  => $contact,
        "Address" => $address,
        "City" => $city,
        "PostalCode" => $cp,
        "Country" => $nation,
        "Phone" => $phone,
    );

    //Ejecuta la funcion para agregar
    $result = $supp ->edit($tabla, $consult, $id);
    
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/suppliers");
}
?>