<?php

require_once("../autoload.php");
use models\tag;

    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
$tag = new tag();
$info = $tag->getSelectors();
echo json_encode($info);
?>