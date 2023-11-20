<?php
    //obtiene los top 10 productos con mas cantidad en el almacen
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
$produc_tags_list = $Dashboard->getTop10();
echo json_encode($produc_tags_list);
?>
