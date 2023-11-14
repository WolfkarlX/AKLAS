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
    if(isset($_POST['product_id'])){
        $registro = $_POST['product_id'];
        $tags = array($_POST['tag-select1'], $_POST['tag-select2'], $_POST['tag-select3'], $_POST['tag-select4']);
        try{
            $produc->setTags($registro, $tags);
            $result = true;
        }catch(\Throwable $th){
            $result = false;
        }
    } else {
        $result = false;
    }
    echo json_encode($result);
} else {
    header("Location: ../views/products");
}
?>
