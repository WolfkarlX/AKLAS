<?php
    require_once("../models/conexion.php");
    use models\conexion;
    $conn = new conexion();

?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ccategory</title>
</head>
<body>
    <p> Put the information required </p>
    <form action="ccategory.php" method="POST">
        <input type="text" placeholder="categoryname" name="categoryname" required> <br>
        <textarea name="categorydesc" cols="30" rows="10" required></textarea>
        <button type="submit">Create category</button>
    </form>
</body>
</html>

<?php
    if (isset($_POST["categoryname"])){
        if(isset($_POST["categorydesc"])){
            $cname = $_POST["categoryname"];
            $cdescription = $_POST["categorydesc"];

            $sql = "INSERT INTO categories (CategoryName, Description) VALUES (:cname, :cdescription)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cname', $cname);
            $stmt->bindParam(':cdescription', $cdescription);
            $stmt->execute();
            exit();
            // Ejecuta la consulta de inserción
            #if ($stmt->execute()) {
            #    echo "Registro insertado correctamente";
             #   exit();
            #}
        }
    }
?>
