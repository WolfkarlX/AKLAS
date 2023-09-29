<?php
require_once("../autoload.php");
use models\supplier;
$supp = new supplier();
$supp_list = $supp->getSuppliers();
echo json_encode($supp_list);
?>
