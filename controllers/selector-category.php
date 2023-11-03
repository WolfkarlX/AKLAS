<?php

require_once("../autoload.php");

use models\category;
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
$cat = new category();
$info = $cat->getSelectors();
echo json_encode($info);
?>