<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\tag;
$tag = new tag();
$tag_list = $tag->select();
echo json_encode($tag_list);
?>