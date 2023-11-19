<?php
use models\tag;

    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");

$filter = new tag();

$results = $filter->filterEachProducts("t");
echo json_encode($results);
?>