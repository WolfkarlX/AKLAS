<?php

require_once("../autoload.php");

use models\area;
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
$area = new area();
$info = $area->getSelectors();
echo json_encode($info);
?>