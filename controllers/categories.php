<?php
    session_start();
    if(empty($_SESSION['user_id']))
    {
        header("Location:../");

    }
?>

<?php
    require_once('../models/conexion.php');
    use models\conexion;
    $conn = new conexion();

    try{
        $sql = "SELECT * FROM categories";
        $stmt = $conn ->prepare($sql);
        $stmt -> execute();
        $categories = $stmt ->fetchAll();

    }catch(PDOException $e){
        echo "Is not possible to make the operation" . $e->getMessage();
    }
?>

<?php 
    if(isset($_POST["delete"])){
        try{
        $id = intval($_POST["delete"]);
        $sql = "DELETE FROM categories WHERE CategoryID = :id";
        $stmt = $conn->prepare($sql);
        $stmt->bindParam(":id", $id, PDO::PARAM_INT);
        $stmt->execute();
        header("Location:categories.php");
        exit();
        }catch(PDOException $e){
            echo "Is not possible to make the operation" . $e->getMessage();
        }
    }

    if(isset($_POST["edit"])){
        header("Location:editcategories.php");
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
            <form action="categories.php" method="POST">
                <button onclick="return confirmarAccion()" id="Delete" name="delete" value="<?php echo $r["CategoryID"];?>"> Delete </button> 
            </form>
            <form action="editcategories.php" method="POST">
                <button value="<?php echo $r["CategoryID"];?>" name="edit">edit</button>
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