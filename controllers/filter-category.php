<?php

use models\category;

    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

$filter = new category();

$results = $filter->filter();
echo json_encode($results);

?>