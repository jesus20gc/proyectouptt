<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Alumnos Reprobados</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
            background: url(images/);
            background-size: cover;
            background-position: center;
            opacity: %;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        table {
            width: 80%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        th, td {
            border: 1px solid #ccc;
            padding: 10px;
            text-align: left;
        }

        th {
            background-color: #007BFF;
            color: #fff;
        }

        tr:nth-child(even) {
            background-color: #f2f2f2;
        }

        a.button {
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;
        }

        a.button:hover {
            background-color: #0056b3;
        }
    </style>
</head>
<body>

    <h1>Alumnos Reprobados</h1>

    <?php
    // Conexión a la base de datos
    $conexion = new mysqli("localhost", "root", "", "evaluacion");

    // Verificar si la conexión fue exitosa
    if ($conexion->connect_error) {
        die("Error de conexión: " . $conexion->connect_error);
    }

    // Consulta para obtener los registros de alumnos reprobados (nota <= 9)
    $consulta = "SELECT id_alumno, id_materia, lapso, periodo_escolar, año_escolar, nota FROM notas WHERE nota <= 9";
    $resultado = $conexion->query($consulta);

    // Verificar si hay resultados
    if ($resultado->num_rows > 0) {
        echo "<table>
                <tr>
                    <th>ID Alumno</th>
                    <th>ID Materia</th>
                    <th>Lapso</th>
                    <th>Periodo Escolar</th>
                    <th>Año Escolar</th>
                    <th>Nota</th>
                </tr>";

        // Mostrar los datos en la tabla
        while ($fila = $resultado->fetch_assoc()) {
            echo "<tr>
                    <td>" . $fila["id_alumno"] . "</td>
                    <td>" . $fila["id_materia"] . "</td>
                    <td>" . $fila["lapso"] . "</td>
                    <td>" . $fila["periodo_escolar"] . "</td>
                    <td>" . $fila["año_escolar"] . "</td>
                    <td>" . $fila["nota"] . "</td>
                  </tr>";
        }

        echo "</table>";
    } else {
        echo "<h2>No hay alumnos reprobados.</h2>";
    }

    // Cerrar conexión
    $conexion->close();
    ?>

    <a class="button" href="admin_menu.php">Volver al Menú</a>

</body>
</html>
