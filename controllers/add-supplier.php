<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

use models\conexion;
//use models\supplier;
//$supp = new supplier();
$conn = new conexion();
//Comprueba si hay una peticion POST
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    //Obtiene los valores
    $firstname = $_POST["first-name"];
    $contact = $_POST["contact"];
    $address = $_POST["address"];
    $city = $_POST["city"];
    $cp = $_POST["cp"];
    $nation = $_POST["nation"];
    $phone = $_POST["phone"];

    $table = "suppliers";
    
    $consult = array(
        "SupplierName" => $firstname,
        "ContactName"  => $contact,
        "Address" => $address,
        "City" => $city,
        "PostalCode" => $cp,
        "Country" => $nation,
        "Phone" => $phone,
    );

    $result = $conn->insertar($table,$consult);
    //Ejecuta la funcion para agregar
    //$result = $supp->addSupplier($firstname, $contact, $address, $city, $cp, $nation, $phone);
    //Devuelve el resultado
    echo json_encode($result);
} else {
    header("Location: ../views/supplier");
}
?>