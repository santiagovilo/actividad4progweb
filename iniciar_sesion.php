<?php
session_start();

// Verificar si se ha enviado el formulario de inicio de sesion
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Obtener los datos del formulario
    $cedula = $_POST['cedula'];
    $contrasena = $_POST['contrasena'];

    // Conectar a la base de datos
    $conexion = mysqli_connect("localhost", "root", "", "embotelladora");

    // Consultar la base de datos para verificar las credenciales del usuario
    $query = "SELECT * FROM usuarios WHERE cedula = '$cedula' AND contrasena = '$contrasena'";
    $resultado = mysqli_query($conexion, $query);

    // Verificar si se encontro un usuario con las credenciales proporcionadas
    if (mysqli_num_rows($resultado) > 0) {

        // Iniciar sesion y redirigir al usuario a la pagina de inicio
        $_SESSION['usuarios'] = $cedula;
        header("Location: index.php");
        exit();
    } else {
        // Mostrar mensaje de error si las credenciales son incorrectas
        $error = "Usuario y/o contraseña incorrectos";
    }

    // Cerrar la conexion a la base de datos
    mysqli_close($conexion);
}
?>

<!-- Se establece el formulario para recibir los datos de inicio de sesion con inputs y respectevias validaciones 
y un boton de inicio de sesion-->

<!DOCTYPE html>
<html>
<head>
    <title>Iniciar Sesión</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Embotelladora de agua Thomsom</h1>
        <br>
        <h2>Iniciar Sesión</h2>
        
        <?php if (isset($error)): ?>
            <div class="alert alert-danger"><?php echo $error; ?></div>
        <?php endif; ?>
        
        <form action="iniciar_sesion.php" method="POST">
            
        <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" name="cedula" id="cedula" class="form-control" required pattern="[0-9]{0,10}">
                <small>La cédula debe contener unicamente dígitos numéricos.</small>
    </div>

        <div class="form-group">
            <label for="contrasena">Contraseña:</label>
            <input type="password" name="contrasena" id="contrasena" class="form-control" required pattern="[a-zA-Z0-9!@#$%^&*()]{6,12}">
            <small>La contraseña debe contener unicamente caracteres alfanuméricos y especiales.</small>
            <br>
            <a href="registrar_usuario.php">Si eres un nuevo usuario, registrate aquí</a> <!-- Se establece un enlace para redirigir al archivo "registrar_usuario" -->
    </div>
    <br>
    <div style="text-align: center;">
    <button type="submit" class="btn btn-primary">Iniciar Sesión</button>
    
</div>
        
</form>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>
