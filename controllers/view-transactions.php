<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\transaction;
$tran = new transaction();
$tran_list = $tran->getTransactions();
echo json_encode($tran_list);
?>
