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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['registro'])){
        $registro = $_POST['registro'];
        $result = $supp->delete($registro);
    } else {
        $result = false;
    }
    echo json_encode($result);
} else {
    header("Location: ../views/suppliers");
}
?>