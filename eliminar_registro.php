<?php
// Conexion a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "embotelladora");

// Verificar si la conexion fue exitosa
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener el ID del registro a eliminar
$id = $_GET['id'];

// Eliminar el registro de la base de datos
$query = "DELETE FROM registros WHERE id = $id";
if (mysqli_query($conexion, $query)) {
    echo "Registro eliminado exitosamente.";
} else {
    echo "Error al eliminar el registro: " . mysqli_error($conexion);
}

// Cerrar la conexion a la base de datos
mysqli_close($conexion);
?>

<!-- Se muestra un mensaje al usuario de eliminacion de registro exitoso -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Eliminar registros</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
        <!-- Se establece un boton para volver al index -->
<body>
    <form action="index.php" method="GET">
    <br> 
        <button type="submit" class="btn btn-primary float-left">Volver al inicio</button>
    </form>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
