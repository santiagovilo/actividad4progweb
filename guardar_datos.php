<?php
// Conexion a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "embotelladora");

// Verificar si la conexion fue exitosa
if (!$conexion) {
    die("Error al conectar a la base de datos: " . mysqli_connect_error());
}

// Obtener la cantidad de botellas y direccion enviada desde el formulario
$cantidad = $_POST['cantidad'];
$direccion = $_POST['direccion'];
$vendedor = $_POST['vendedor'];

// Funcion para registrar el llenado de un botellon de agua y su direccion
function llenarBotellon($cantidad, $direccion, $vendedor, $conexion) {

    // Obtener la fecha y hora actual
    date_default_timezone_set('America/Caracas');
    $fechaHora = date("Y-m-d H:i:s");
    
    // Insertar el registro en la base de datos
    $query = "INSERT INTO registros (fecha_hora, cantidad, direccion, vendedor) VALUES ('$fechaHora', '$cantidad', '$direccion', '$vendedor')";
    if (mysqli_query($conexion, $query)) {
        $mensaje = "Registro guardado exitosamente.";
    } else {
        $mensaje = "Error al guardar el registro: " . mysqli_error($conexion);
    }
    
    return $mensaje;
}

// Llamar a la funcion para registrar el llenado del botellon
$mensajeRegistro = llenarBotellon($cantidad, $direccion, $vendedor, $conexion);

// Cerrar la conexion a la base de datos
mysqli_close($conexion);
?>

<!-- Se muestra un mensaje al usuario de registro exitoso -->
<!DOCTYPE html>
<html>
<head>
    <title>Embotelladora de Agua</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <?php echo $mensajeRegistro; ?>
        <!-- Se establece un boton para volver al index -->
        <form action="index.php" method="GET">
            <br>
            <button type="submit" class="btn btn-primary float-left">Volver al inicio</button>
        </form>
    </div>

    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
