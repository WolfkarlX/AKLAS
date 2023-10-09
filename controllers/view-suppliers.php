<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\supplier;
$supp = new supplier();
$supp_list = $supp->select();
echo json_encode($supp_list);
?>
