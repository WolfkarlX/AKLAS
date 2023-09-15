<?php
    require_once("../models/conexion.php"); #importa el archivo conexion de la base de datos
    use models\conexion;     #usa el archivo conexion de la base de datos 
    $conn = new conexion();     #instancia la clase conexion del archivo conexion para utilizar sus atributos y metodos y hacer el crud     
    session_start(); #inicia sesiones para poder hacer variables, modificaciones, etc

    if(isset($_SESSION["commited"])){    #condiciona si tiene la sesion iniciada de "commited"
?>        
    <script> alert('Category created successfuly')</script>    <!-- Hace una alerta que frontend puede modificar---> 
<?php
        
        session_unset();   #elimina el valor de la variable de la sesion "commited"
        session_destroy(); #destruye todas las sesiones
        header("refresh:0.0000000000001;url=categories.php"); # reenvia en 000000.... de tiempo a la pagina categories
        exit(); #termina el script
    }
?>

<?php #zona de la insertacion de contenido              
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {         #condiciona si hay una respuesta del servidor del tipo POST
        try {
            #zona de asignacion de valores ingresados mediante html
            $cname = $_POST["categoryname"];
            if(!empty($_POST["categorydesc"])){ #se valida si lo que se envia desde el html esta vacio y si si lo esta se ingresa un string
                $cdescription = $_POST["categorydesc"]; 
            }else{
                $cdescription = "there is no description";
            }
            $sql = "INSERT INTO categories (CategoryName, Description) VALUES (:cname, :cdescription)";
            $stmt = $conn->prepare($sql);
            $stmt->bindParam(':cname', $cname, PDO::PARAM_STR);     #se preparan las variables 
            $stmt->bindParam(':cdescription', $cdescription, PDO::PARAM_STR);
            $killed = $stmt->execute(); #creo una variable para validarla 
            header("Location: ccategory.php");      #se reenvia a la misma pagina
            
            if(isset($killed)){
                $_SESSION["commited"] = true;           #se condiciona si se logra hacer execute o si se agrego algo a la bd,
                                                        #se va a crer una variable de sesion llamada "commit" con el valor "true"
            }
            
            exit();      #se termina o cierra el script          

        } catch (PDOException $e) { 
            echo "Is not possible to make the operation" . $e->getMessage();    #en caso de fallar la conexion con la bd, se imprime el anterior mensaje
        }
    }
    
?>

<!--Zona HTML-->
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
        <textarea name="categorydesc" placeholder="category description" cols="30" rows="10" id="miTextarea"></textarea>
        <button type="submit" onclick="eliminarEspacios()">Create category</button>
    </form>
</body>
</html>
<script>
/*Script para eliminar espacios en blanco del html */
    function eliminarEspacios() {
        // Obtén el contenido del textarea
        var textarea = document.getElementById("miTextarea");
        var contenido = textarea.value;

        // Reemplaza todos los espacios en blanco con una cadena vacía
        var contenidoSinEspacios = contenido.replace(/\s+/g, '');

        // Verifica si el contenido después de quitar los espacios es vacío
        if (contenidoSinEspacios === '') {
        // Si es vacío, establece el contenido del textarea como vacío
            textarea.value = '';
        }
    }
</script> <!-- se puede mover a models para importarla y usarla desde aqui -->