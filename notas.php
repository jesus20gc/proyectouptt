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
        input{
            border-radius: 5px;
            margin-top: 20px;
            border: 1px solid #007BFF;

        }
         .button {
            text-decoration: none;
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 20px;

        }
        .button:hover {
            background-color: #0056b3;
        }

    </style>
</head>
<body>
    <h1>Menú de selección:</h1>
    <ul>
        <li><a href="alumnos.php">Alumnos</a></li>
       
        <li><a href="año.php">Años</a></li>
        
        
    </ul>
    <a class='button' href='añadir_notas.php'>Añadir nota</a>
        <a class='button' href='modificar_notas.php'>Modificar notas</a>
        <a class='button' href='eliminar_notas.php'>Eliminar nota</a>
        <a class='button' href='admin_menu.php'>Volver</a>

         <br><p><form method="post" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <label for="id_alumno">Buscar por ID:</label>
            <input type="text" id="id_alumno" name="id_alumno" required>

            <a><button class="button" type="submit">Buscar</button></a>
        </form>
        

    <div>
        <?php
        // Conectar a la base de datos (reemplaza con tus propios datos)
        $conexion = new mysqli("localhost", "root", "", "evaluacion");

        // Verificar la conexión
        if ($conexion->connect_error) {
            die("Error de conexión: " . $conexion->connect_error);
        }
        // Manejar la búsqueda
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $id_alumno = $_POST["id_alumno"];

            $consulta = "SELECT id_alumno, id_materia, lapso, periodo_escolar, año_escolar, nota FROM notas WHERE id_alumno = $id_alumno";
            $resultado = $conexion->query($consulta);

            // Mostrar los resultados de la búsqueda
            if ($resultado->num_rows > 0) {
                echo "<h2>Resultados de la Búsqueda</h2>";
                echo "<table>";
                echo "<tr><th>ID Alumno</th><th>Materia</th><th>Lapso escolar</th><th>Periodo escolar</th><th>Año escolar</th><th>Nota</th></tr>";
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr><td>" . $fila["id_alumno"] . "</td><td>" . $fila["id_materia"] . "</td><td>" . $fila["lapso"] . "</td><td>" . $fila["periodo_escolar"] . "</td><td>" . $fila["año_escolar"] . "</td><td>" . $fila["nota"] . "</td></tr>";
                }
                echo "</table>";
            } else {
                echo "<h2>No se encontraron resultados para el ID proporcionado</h2>";
            }
        }

        // Realizar la consulta a la tabla "notas"
        $consulta = "SELECT id_alumno,id_materia,lapso,periodo_escolar,año_escolar,nota FROM notas";
        $resultado = $conexion->query($consulta);

        // Mostrar los resultados en una tabla
        if ($resultado->num_rows > 0) {
            echo "<table>";
            echo "<tr><th>id_alumno</th><th>id_materia</th><th>lapso</th><th>periodo escolar</th><th>año escolar</th><th>nota</th></tr>";
            while ($fila = $resultado->fetch_assoc()) {
                echo "<tr><td>" . $fila["id_alumno"] . "</td><td>" . $fila["id_materia"] . "</td><td>" . $fila["lapso"] . "</td><td>" . $fila["periodo_escolar"] ."</td><td>" . $fila["año_escolar"] ."</td><td>" . $fila["nota"] . "</td></tr>";
            }
            echo "</table>";
        } else {
            echo "No se encontraron resultados.";
        }

       
        // Cerrar la conexión a la base de datos
        $conexion->close();
        ?>
    </div>
</body>
</html>
