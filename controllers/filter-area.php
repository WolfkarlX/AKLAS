<?php

use models\area;

    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

$filter = new area();

$results = $filter->filter();
echo json_encode($results);

?>