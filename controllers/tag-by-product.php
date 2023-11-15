<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");
    }
?>

<?php
require_once("../autoload.php");
use models\product;

$produc = new product();
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if(isset($_POST['registro'])){
        $registro = $_POST['registro'];
        try{
            $produc_tags_list = $produc->getTagsByProduct($registro);
        }catch(\Throwable $th){
            $produc_tags_list = False;
        }
    } else {
        $produc_tags_list = False;
    }
    echo json_encode($produc_tags_list);
} else {
    header("Location: ../views/products");
}
?>
