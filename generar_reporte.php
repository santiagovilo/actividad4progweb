<?php
require_once('./dompdf/autoload.inc.php');
use Dompdf\Dompdf;

// Conexion a la base de datos
$conexion = mysqli_connect("localhost", "root", "", "embotelladora");

// Funcion para generar un reporte en PDF
function generarReportePDF($conexion) {
    // Crear instancia de Dompdf
    $dompdf = new Dompdf();

    // Obtener el historico de registros
    $query = "SELECT * FROM registros";
    $resultado = mysqli_query($conexion, $query);

    // Generar el contenido HTML del reporte
    $html = '<h1 style="text-align: center; color: blue;">Reporte del llenado de botellones</h1>';
    $html .= '<table style="width: 100%; border-collapse: collapse;">';
    $html .= '<tr style="background-color: #f2f2f2;"><th>ID de la venta</th><th>Fecha y hora</th><th>Cantidad de botellones</th><th>Dirección</th><th>Vendedor</th></tr>';
    
    while ($fila = mysqli_fetch_assoc($resultado)) {
        $html .= '<tr>';
        $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $fila['id'] . '</td>';
        $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $fila['fecha_hora'] . '</td>';
        $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $fila['cantidad'] . '</td>';
        $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $fila['direccion'] . '</td>';
        $html .= '<td style="border: 1px solid #ddd; padding: 8px;">' . $fila['vendedor'] . '</td>';
        $html .= '</tr>';
    }
    
    $html .= '</table>';
    
    // Cargar el contenido HTML en Dompdf
    $dompdf->loadHtml($html);

    $dompdf->setPaper('A4', 'Inandscape');

    // Renderizar el contenido HTML en PDF
    $dompdf->render();

    $dompdf->stream('reporte.pdf', array('Attachment'=>0));

}

// Llamar a la funcion para generar el reporte en PDF
generarReportePDF($conexion);

// Cerrar la conexion a la base de datos
mysqli_close($conexion);
?>