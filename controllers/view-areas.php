<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php

require_once("../autoload.php");
use models\area;
$area = new area();
$area_list = $area->select();
echo json_encode($area_list);
?>
