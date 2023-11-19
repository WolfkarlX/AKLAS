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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['registro'])){
        $registro = $_POST['registro'];
        $list_TD = $tran->getTransactionsDetails($registro);
        echo json_encode($list_TD);
    }
} else {
    header("Location: ../views/transactions");
}
?>