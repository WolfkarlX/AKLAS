<?php
    //regresa el valor de cada porcentaje de producto del producto total entre cada area
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

use models\Dashboard;

$Dashboard = new Dashboard();
$Dashboard->permisos();
$produc_tags_list = $Dashboard->getPorcentages();
echo json_encode($produc_tags_list);
?>
