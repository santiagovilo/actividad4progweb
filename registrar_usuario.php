<?php
session_start();

// Verificar si se ha enviado el formulario de registro de usuario
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $cedula = $_POST['cedula'];
    $contrasena = $_POST['contrasena'];
    $nombre = $_POST['nombre'];
    $telefono = $_POST['telefono'];

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "embotelladora");

    // Verificar si el usuario ya existe en la base de datos
    $query = "SELECT * FROM usuarios WHERE cedula = '$cedula'";
    $resultado = mysqli_query($conexion, $query);

    if (mysqli_num_rows($resultado) > 0) {
        // Mostrar mensaje de error si el usuario ya existe
        $error = "El usuario ya está registrado";
    } else {
        // Insertar el nuevo usuario en la base de datos
        $query = "INSERT INTO usuarios (cedula, contrasena, nombre, telefono) VALUES ('$cedula', '$contrasena', '$nombre', '$telefono')";
        mysqli_query($conexion, $query);

        // Iniciar sesion y redirigir al usuario a la pagina de inicio
        $_SESSION['usuario'] = $cedula;
        header("Location: index.php");
        exit();
    }

    // Cerrar la conexion a la base de datos
    mysqli_close($conexion);
}
?>

<!-- Se establece el formulario para registrar un nuevo usuario con inputs y respectivas validaciones -->
<!DOCTYPE html>
<html>
<head>
    <title>Registrar Usuario</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Embotelladora de agua Thomsom</h1>
        <br>
        <h2>Registro de usuario</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="registrar_usuario.php" method="POST">
            <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" name="cedula" id="cedula" class="form-control" required pattern="[0-9]{0,10}">
                <small>La cédula debe contener únicamente dígitos numéricos.</small>
            </div>

            <div class="form-group">
                <label for="contrasena">Contraseña:</label>
                <input type="password" name="contrasena" id="contrasena" class="form-control" required pattern="[a-zA-Z0-9!@#$%^&*()]{0,12}">
                <small>La contraseña debe contener únicamente caracteres alfanuméricos y especiales (Maximo 12 caracteres).</small>
            </div>

            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" id="nombre" class="form-control" required pattern="[A-Za-z\s]+" title="Solo se permiten letras">
                <small>El nombre debe contener únicamente caracteres alfabéticos.</small>
            </div>

           
            <div class="form-group">
                <label for="telefono">Teléfono:</label>
                <input type="tel" name="telefono" id="telefono" class="form-control" required pattern="[0-9]{9,12}" title="El teléfono debe contener únicamente dígitos numéricos (Ej: 04121234567)">
                <small>El teléfono debe contener únicamente dígitos numéricos (Ej: 04121234567).</small>
            </div>

            <br>
            <div style="text-align: center;">
            <button type="submit" class="btn btn-primary float-right">Registrar</button>
            <a href="iniciar_sesion.php" class="btn btn-primary float-left" style="background-color:#D3212D;">Volver</a>
            </div>
            
        </form>
        
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
