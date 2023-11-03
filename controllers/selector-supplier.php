<?php

require_once("../autoload.php");
use models\supplier;
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
$sup = new supplier();
$info = $sup->getSelectors();
echo json_encode($info);
?>