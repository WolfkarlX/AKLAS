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
$produc_tags_list = $produc->getTags();
echo json_encode($produc_tags_list);
?>