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
    if (isset($_POST['reason']) && isset($_POST['products']) && isset($_POST['inputs']) && isset($_POST['outputs'])) {
        $last_transaction_id = $tran->addTransaction($_SESSION['EmployeID'], $_POST['reason']);
        $products = explode(",", $_POST['products']);
        $inputs = explode(",", $_POST['inputs']);
        $outputs = explode(",", $_POST['outputs']);
        $results = array($last_transaction_id);
        foreach ($products as $index => $product) {
            if($product){
                $result = $tran->addDetail($last_transaction_id, $product, $inputs[$index], $outputs[$index]);
                array_push($results, $result);
            }
        }
        echo json_encode($results);
    }
} else {
    header("Location: ../views/transactions");
}
?>