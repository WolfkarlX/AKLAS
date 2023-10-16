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
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['registro'])){
        $registro = $_POST['registro'];
        $result = $cat->delete($registro);
    } else {
        $result = false;
    }
    echo json_encode($result);
} else {
    header("Location: ../views/categories");
}
?>