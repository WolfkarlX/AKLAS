<?php

session_start();
if(empty($_SESSION['user_id']))
{
    header("Location:../");
}
?>

<?php
require_once("../autoload.php");
use models\users;

$user = new users();
$userlist = $user->getUsers();
echo json_encode($userlist);
?>
