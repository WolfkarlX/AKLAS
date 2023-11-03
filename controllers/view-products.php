<?php

    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\product;

$produc = new product();
$atr = $produc->getAtribute();
$produc_list = $produc->JOIN();
echo json_encode($produc_list);
?>
