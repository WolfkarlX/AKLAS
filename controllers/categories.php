<?php
    require_once('../models/conexion.php');
    use models\conexion;
    $conn = new conexion();

    $sql = "SELECT * FROM categories";
    $stmt = $conn ->prepare($sql);
    $stmt -> execute();
    $categories = $stmt ->fetchAll();
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <a href="ccategory.php">Create a new category</a>
    <h1>Aqui se imprimen todas las categorias existentes</h1>
    <?php
        foreach($categories as $r){ ?>
            <h1><?php echo $r["CategoryName"]; ?></h1>
            <p><?php echo $r["Description"]; ?></p>
            <a href="">edit</a>
            <a href=""> delete</a>
            <br>
    <?php } ?> 
</body>
</html>
