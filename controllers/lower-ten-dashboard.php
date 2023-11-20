<?php
    //regresa el valor de los 10 productos de menor cantidad en el almacen
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
$produc_tags_list = $Dashboard->getLess10();
echo json_encode($produc_tags_list);
?>
