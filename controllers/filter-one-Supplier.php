<?php

use models\supplier;

    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

$filter = new supplier();

$results = $filter->filterEachProducts("s");
echo json_encode($results);
?>