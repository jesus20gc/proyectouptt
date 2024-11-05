<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Selección</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
            margin: 0;
            padding: 0;
        }

        h1 {
            text-align: center;
            color: #333;
            margin-top: 20px;
        }

        ul {
            list-style: none;
            padding: 0;
            margin: 0;
            display: flex;
            flex-direction: column;
            align-items: center;
        }

        li {
            margin: 10px 0;
        }

        a {
            text-decoration: none;
            color: #007BFF;
            font-weight: bold;
            font-size: 18px;
            transition: color 0.3s;
        }

        a:hover {
            color: #0056b3;
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
    <h1>Menú de selección:</h1>
    <ul>
        
        
        <li><a href="año.php">Años</a></li>
        
        <li><a href="notas.php">Notas</a></li>
    </ul>

    <div>
        <?php
        // Conectar a la base de datos (reemplaza con tus propios datos)
        $conexion = new mysqli("localhost", "root", "", "evaluacion");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }

        // Realizar la consulta a la tabla "notas"
        $consulta = "SELECT id_alumno, nombre, apellido,direccion,telefono,sexo,fecha_nacimiento,año_escolar FROM alumnos";
        $resultado = $conexion->query($consulta);

        // Mostrar los resultados en una tabla
        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>id_alumno</th><th>nombre</th><th>apellido</th><th>direccion</th><th>telefono</th><th>sexo</th><th>fecha_nacimiento</th><th>año escolar</th></tr>";
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr><td>" . $fila["id_alumno"] . "</td><td>" . $fila["nombre"] . "</td><td>" . $fila["apellido"] . "</td><td>" . $fila["direccion"] . "</td><td>" . $fila["telefono"] ."</td><td>" . $fila["sexo"] ."</td><td>" . $fila["fecha_nacimiento"] . "</td><td>". $fila["año_escolar"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }

        // Mostrar el botón de "Añadir" siempre, incluso si no hay resultados
        echo "<a class='button' href='añadir.php'>Añadir alumno</a>";
        echo  "<br>";
        echo "<a class='button' href='admin_menu.php'> Volver</a>";
        

        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>
    </div>
</body>
</html>
