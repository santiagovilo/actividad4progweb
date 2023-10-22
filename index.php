<?php
// Conexion a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "embotelladora");

// Funcion para registrar el llenado de un botellon de agua
function llenarBotellon($cantidad, $direccion, $vendedor) {
    global $conexion;
    
    // Obtener la fecha y hora actual
    date_default_timezone_set('America/Caracas');
    $fechaHora = date("Y-m-d H:i:s");
    
    // Insertar el registro en la base de datos
    $query = "INSERT INTO registros (fecha_hora, cantidad, direccion, vendedor) VALUES ('$fechaHora', $cantidad, '$direccion', '$vendedor')";
    mysqli_query($conexion, $query);
}

// Funcion para generar un reporte en PDF
function generarReportePDF() {
}

// Funcion para eliminar un registro
function eliminarRegistro($id) {
    global $conexion;
    
    // Eliminar el registro de la base de datos
    $query = "DELETE FROM registros WHERE id = $id";
    mysqli_query($conexion, $query);
}

// Obtener el historico de registros
$query = "SELECT * FROM registros";
$resultado = mysqli_query($conexion, $query);
?>
 
<!DOCTYPE html>
<html>
<head>
    <title>Embotelladora de agua Thomsom</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
</head>
<body>
    <div class="container">
        <h1>Embotelladora de agua Thomsom</h1>
        <a href="iniciar_sesion.php" class="btn btn-primary float-right" style="background-color:#D3212D;">Cerrar sesión</a>
       
        <!-- Formulario para llenar botellones de agua--> 
        <h2>Llenar botellón</h2>
        <form action="guardar_datos.php" method="POST">
            <!-- Campo para ingresar la cantidad de botellones-->    
            <div class="form-group">
                <label for= "cantidad" >Cantidad de botellones a llenar:</label>
                <input type="number" name= "cantidad" id= "cantidad" min=1 max=300 class="form-control" required>
            </div>
            <!-- Seleccionar la direccion de la venta -->   
            <div class="form-group">
                <label for= "direccion">Dirección de la venta:</label>
                <select name= "direccion" id= "direccion" class="form-control" required>
                    <option value="Amazonas">Amazonas</option>
                    <option value="Anzoátegui">Anzoátegui</option>
                    <option value="Apure">Apure</option>
                    <option value="Aragua">Aragua</option>
                    <option value="Barinas">Barinas</option>
                    <option value="Bolívar">Bolívar</option>
                    <option value="Carabobo">Carabobo</option>
                    <option value="Cojedes">Cojedes</option>
                    <option value="Delta Amacuro">Delta Amacuro</option>
                    <option value="Distrito Federal">Distrito Federal</option>
                    <option value="Falcón">Falcón</option>
                    <option value="Guárico">Guárico</option>
                    <option value="Lara">Lara</option>
                    <option value="Mérida">Mérida</option>
                    <option value="Miranda">Miranda</option>
                    <option value="Monagas">Monagas</option>
                    <option value="Nueva Esparta">Nueva Esparta</option>
                    <option value="Portuguesa">Portuguesa</option>
                    <option value="Sucre">Sucre</option>
                    <option value="Táchira">Táchira</option>
                    <option value="Trujillo">Trujillo</option>
                    <option value="Vargas">Vargas</option>
                    <option value="Yaracuy ">Yaracuy</option>
                    <option value="Zulia">Zulia</option>
                </select>
            </div>
            <!-- Seleccionar el vendedor quien va a realizar la venta-->
            <div class="form-group">
                <label for= "vendedor">Vendedor:</label>
                <select name= "vendedor" id= "vendedor" class="form-control" required>
                <option value="ID-zu00001">ID-zu00001</option>
                <option value="ID-zu00002">ID-zu00002</option>
                <option value="ID-zu00003">ID-zu00003</option>
                <option value="ID-zu00004">ID-zu00004</option>
                <option value="ID-zu00005">ID-zu00005</option>
                <option value="ID-zu00006">ID-zu00006</option>
                <option value="ID-zu00007">ID-zu00007</option>
                <option value="ID-zu00008">ID-zu00008</option>
                <option value="ID-zu00009">ID-zu00009</option>
                <option value="ID-zu00010">ID-zu00010</option>
                </select>
            </div>
            <button type="submit" class="btn btn-primary">Llenar</button>
            
        </form>
        <br>
        <!-- Se implementa los titulos para identificar los valores de la tabla -->
        <h2>Historial de registros</h2>
        <table class="table">
            <thead>
                <tr>
                    <th>Fecha y hora</th>
                    <th>Cantidad de botellones llenados</th>
                    <th>Dirección</th>
                    <th>Vendedor</th>
                    <th>Acciones</th>
                </tr>
            </thead>
            <tbody>
                <?php

                // Mostrar los registros en la interfaz de usuario
                while ($fila = mysqli_fetch_assoc($resultado)) {
                    echo "<tr>";
                    echo "<td>" . $fila['fecha_hora'] . "</td>";
                    echo "<td>" . $fila['cantidad'] . "</td>";
                    echo "<td>" . $fila['direccion'] . "</td>";
                    echo "<td>" . $fila['vendedor'] . "</td>";
                    echo "<td><a href='eliminar_registro.php?id=" . $fila['id'] . "' class='btn btn-danger'>Eliminar</a></td>";
                    echo "</tr>";
                }
                ?>
            </tbody>
        </table>
            <!-- Se establece un boton para generar el reporte en pdf -->
        <h2>Generar reporte en PDF</h2>
            <br>
            <button type="button" onclick="window.open('generar_reporte.php')" class="btn btn-primary">Generar Reporte</button>
    </div>
    
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>

<?php
// Cerrar la conexion a la base de datos
mysqli_close($conexion);
?>