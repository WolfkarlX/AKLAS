<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\area;
$area = new area();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['registro'])){
        $registro = $_POST['registro'];
        try{
            $result = $area->delete($registro);
        }catch(\Throwable $th){
            $result = false;
        }
    } else {
        $result = false;
    }
    echo json_encode($result);
} else {
    header("Location: ../views/categories");
}
?>