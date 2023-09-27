<?php
require_once("../autoload.php");
use models\supplier;
$supp = new supplier();
echo $supp->addSupplier();

?>