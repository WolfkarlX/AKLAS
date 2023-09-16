<?php
require_once("../autoload.php");
use models\supplier;
$supp = new supplier();
$supp_list = $supp->getSuppliers();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Suppliers</title>
</head>
<body>
    <h1>Proveedores</h1>
    <table>
        <tr>
            <th>ID</th>
            <th>Name</th>
            <th>Contact</th>
            <th>Address</th>
            <th>City</th>
            <th>Postal Code</th>
            <th>Country</th>
            <th>Phone</th>
        </tr>
    <?php foreach ($supp_list as $supp_item) { ?>
        <tr>
            <th><?php echo $supp_item[0]; ?></th>
            <th><?php echo $supp_item[1]; ?></th>
            <th><?php echo $supp_item[2]; ?></th>
            <th><?php echo $supp_item[3]; ?></th>
            <th><?php echo $supp_item[4]; ?></th>
            <th><?php echo $supp_item[5]; ?></th>
            <th><?php echo $supp_item[6]; ?></th>
            <th><?php echo $supp_item[7]; ?></th>
        </tr>
    <?php } ?>
    </table>
</body>
</html>