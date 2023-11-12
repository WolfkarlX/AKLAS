<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    echo "Ingrese el codigo que se envio a su correo electronico: ";
    <form action="probarcodigo.php" method="post" id="MyForm">
            <input type="text" class="input-field" placeholder="Ingrese el codigo" name="codigo" required>
            <button type="submit" class="button" value="Actualizar contraseña">Cambiar contraseña</button>
        </form>
</body>
</html>