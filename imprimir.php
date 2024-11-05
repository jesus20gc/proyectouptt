<?php
require_once('tcpdf/tcpdf.php');

// Conectar a la base de datos (reemplaza con tus propios datos)
$conexion = new mysqli("localhost", "root", "", "evaluacion");

// Verificar la conexión
if ($conexion->connect_error) {
    die("Error de conexión: " . $conexion->connect_error);
}

// Realizar la consulta a la tabla "notas"
$consulta = "SELECT id_alumno, nombre, apellido, direccion, telefono, sexo, fecha_nacimiento, año_escolar FROM alumnos";
$resultado = $conexion->query($consulta);

// Crear una nueva instancia de TCPDF
$pdf = new TCPDF();

// Agregar una página al PDF
$pdf->AddPage();

// Crear la tabla en el PDF
$html = '<table border="1">
           
            <tr>
            
                <th>id_alumno</th>
                <th>nombre</th>
                <th>apellido</th>
                <th>direccion</th>
                <th>telefono</th>
                <th>sexo</th>
                <th>fecha_nacimiento</th>
                <th>año escolar</th>
            </tr>';

while ($fila = $resultado->fetch_assoc()) {
    $html .= '<tr>
                <td>' . $fila["id_alumno"] . '</td>
                <td>' . $fila["nombre"] . '</td>
                <td>' . $fila["apellido"] . '</td>
                <td>' . $fila["direccion"] . '</td>
                <td>' . $fila["telefono"] . '</td>
                <td>' . $fila["sexo"] . '</td>
                <td>' . $fila["fecha_nacimiento"] . '</td>
                <td>' . $fila["año_escolar"] . '</td>
              </tr>';
}

$html .= '</table>';

// Agregar la tabla al PDF
$pdf->writeHTML($html, true, false, true, false, '');

// Nombre del archivo PDF
$nombreArchivo = 'contenido_alumnos.pdf';

// Salida del PDF (puedes cambiar 'I' a 'D' para descargar en lugar de ver)
$pdf->Output($nombreArchivo, 'I');

// Cerrar la conexión a la base de datos
$conexion->close();
?>
