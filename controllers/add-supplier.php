<?php
require_once("../autoload.php");
use models\supplier;
$supp = new supplier();
echo $supp->addSupplier("Exotic Liquids", "Charlotte Cooper", "49 Gilbert St.", "London", "EC1 4SD", "UK", "(171) 555-2222");

?>