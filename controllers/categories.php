<?php
    require_once('../models/conexion.php');
    use models\conexion;
    $conn = new conexion();

    $sql = "SELECT * FROM categories";
    $stmt = $conn ->prepare($sql);
    $stmt -> execute();
    $categories = $stmt ->fetchAll();
?>

<?php 
    if(isset($_POST["delete"])){
        $id = intval($_POST["delete"]);
        $sql = "DELETE FROM categories WHERE CategoryID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location:categories.php");
        exit();
    }
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Create</title>
</head>
<body>
    <h1>Categories</h1>
    <a href="ccategory.php">Create a new category</a>
    
    <?php
        foreach($categories as $r){ ?>
            <h1><?php echo $r["CategoryName"]; ?></h1>
            <p><?php echo $r["Description"]; ?></p>
            <a href=" <?php $_POST["ID"] = $r["CategoryID"]; ?> ">edit</a>
            <form action="categories.php" method="POST">
                <button onclick="return confirmarAccion()" id="Delete" name="delete" value="<?php echo $r["CategoryID"];?>"> Delete </button> 
            </form>
            <br>
    
    <?php } ?> 

</body>
</html>
<!--Script para hacer la confirmacion de eliminacion de un registro o categoria -->

<script>
    function confirmarAccion() {
        // Utiliza la función confirm() para mostrar el mensaje de confirmación
        var confirmacion = confirm("¿Are you sure you want to delete this categorie?"); 
        // Comprueba la respuesta del usuario
        if(confirmacion){
            // El usuario hizo clic en "Aceptar", realiza la acción
            alert("category eliminated succesfully.");
            return true
        }else{
            // El usuario hizo clic en "Cancelar" o cerró la ventana de confirmación
            alert("The action was canceled");
            return false
        }
    }
</script>