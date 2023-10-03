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
    if(isset($_POST["edit"])){
        $id = $_POST["edit"]; 
    }
    $sql = "SELECT * FROM categories WHERE CategoryID = :id";
    $stmt = $conn ->prepare($sql);
    $stmt -> bindParam(":id", $id, PDO::PARAM_STR);
    $stmt -> execute();
    $categories = $stmt ->fetchAll();

?>

<?php if(isset($_POST["edit1"])){
    if(!empty($_POST["name"]) && empty($_POST["description"])){
        try{
            $id = $_POST["edit1"];
            $name = $_POST["name"];
            $sql = "UPDATE categories SET CategoryName = :name WHERE CategoryID = :id"; 
            $stmt = $conn->prepare($sql);
            $stmt ->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt ->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt ->execute();
            header("Location:categories.php");
            exit();
        }catch(PDOException $e){
            echo "The operation was impossible" . $e->getMessage();
            header("refresh:3;url=categories.php");
        }

    }if(!empty($_POST["description"]) && empty($_POST["name"])){
        try{
            $id = $_POST["edit1"];
            $description = $_POST["description"];
            $sql = "UPDATE categories SET Description = :description WHERE CategoryID = :id"; 
            $stmt = $conn->prepare($sql);
            $stmt ->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt ->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt ->execute();
            header("Location:categories.php");
            exit();
        }catch(PDOException $e){
            echo "The operation was impossible" . $e->getMessage();
            header("refresh:3;url=categories.php");
        }

    }if(empty($_POST["name"]) && empty($_POST["description"])){
        header("Location:categories.php");
        exit();
    }
    if(!empty($_POST["name"]) && !empty($_POST["description"])){
        try{
            $id = $_POST["edit1"];
            $name = $_POST["name"];
            $description = $_POST["description"];
            $sql = "UPDATE categories SET CategoryName = :name, Description = :description WHERE CategoryID = :id"; 
            $stmt = $conn->prepare($sql);
            $stmt ->bindParam(":name", $name, PDO::PARAM_STR);
            $stmt ->bindParam(":description", $description, PDO::PARAM_STR);
            $stmt ->bindParam(":id", $id, PDO::PARAM_STR);
            $stmt ->execute();
            header("Location:categories.php");
            exit();
            
        }catch(PDOException $e){
            echo "Is not possible to make the operation" . $e->getMessage();
            header("refresh:3;url=categories.php");
        }
    }
}

    
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>edit</title>
</head>
<body>
    <?php
        foreach($categories as $r){ ?>
            <form action="editcategories.php" method="POST">
                <input type="text" value="<?php echo $r["CategoryName"];?>" id="Name" name="name"> <br>
                <textarea cols="30" rows="10" name="description" id="Desc"><?php echo $r["Description"]; ?></textarea>    
                <button onclick="eliminarEspacios()" id="Edit" name="edit1" value="<?php echo $r["CategoryID"]; ?>"> edit </button> 
            </form>
            <br>
    <?php } ?> 
    



</body>
</html>

<script>
/*Script para eliminar espacios en blanco del html */ 
    function eliminarEspacios() {
        // Obtén el contenido del textarea
        var input = document.getElementById("Desc")
        var textarea = document.getElementById("Name");
        var contenido = textarea.value;
        var content = input.value;

        // Reemplaza todos los espacios en blanco con una cadena vacía
        var contenidoSinEspacios = contenido.replace(/\s+/g, '');
        var contentwithouthspace = content.replace(/\s+/g, '');
        // Verifica si el contenido después de quitar los espacios es vacío
        if (contenidoSinEspacios === '') {
        // Si es vacío, establece el contenido del textarea como vacío
            textarea.value = '';
        }
        if(contentwithouthspace === ''){
            input.value = '';
        }
    }
</script> <!-- se puede mover a models para importarla y usarla desde aqui -->