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
echo $supp->addSupplier();

?>