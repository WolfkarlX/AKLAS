<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\category;
$cat = new category();
$cat_list = $cat->select();
echo json_encode($cat_list);
?>
