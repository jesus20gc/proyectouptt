<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
</head>
<style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f4f4f4;
            text-align: center;
              margin: 0;
            padding: 0;
            background: url(images/liceo.jpg);
            background-size: cover;
            background-position: center;
            opacity: %;
        }
         .container {
            background-color: #ffffff;
            padding: 20px;
            border-radius: 5px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.2);
            max-width: 400px;
            margin: 0 auto;
            margin-top: 20px;
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
        label {
            font-weight: bold;
            color: #333;
        }

        .form-control {
            width: 100%;
            padding: 10px;
            border: 1px solid #007BFF;
            border-radius: 5px;
        }

        .button-container {
            text-align: center;
            margin-top: 20px;
        }

        .btn-primary {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
        }

        .btn-primary:hover {
            background-color: #0056b3;
        }

        .alert {
            margin-top: 20px;
        }

        .alert-success {
            background-color: #d4edda;
            color: #155724;
        }

        .alert-danger {
            background-color: #f8d7da;
            color: #721c24;
        }

        .volver-button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            border-radius: 5px;
            padding: 10px 20px;
            cursor: pointer;
            text-decoration: none;
        }

        .volver-button:hover {
            background-color: #0056b3;
        }
    </style>

<body>
    <div class="container">
        <h1>Modificar Alumno</h1>
        <?php
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['modificar'])) {
    $cedula = $_POST['cedula'];
    $nombre = $_POST['nombre'];
    $apellido = $_POST['apellido'];
    $direccion = $_POST['direccion'];
    $telefono = $_POST['telefono'];
    $sexo = $_POST['sexo'];
    $año_escolar = $_POST['año_escolar'];
    $fecha_nacimiento = $_POST['fecha_nacimiento'];

    // Establece la conexión a la base de datos
    $servername = "localhost"; // Cambia esto a la dirección de tu servidor de base de datos
    $username = "root"; // Cambia esto a tu nombre de usuario de base de datos
    $password = ""; // Cambia esto a tu contraseña de base de datos
    $dbname = "evaluacion"; // Cambia esto al nombre de tu base de datos

    $conn = new mysqli($servername, $username, $password, $dbname);

    if ($conn->connect_error) {
        die("Conexión fallida: " . $conn->connect_error);
    }

    // Actualiza los datos en la tabla de la base de datos
    $sql = "UPDATE alumnos SET nombre='$nombre', apellido='$apellido', direccion='$direccion', telefono='$telefono', sexo='$sexo', fecha_nacimiento='$fecha_nacimiento', año_escolar='$año_escolar' WHERE id_alumno='$cedula'";

    if ($conn->query($sql) === TRUE) {
        echo '<div class="alert alert-success" role="alert">Modificación exitosa</div>';
    } else {
        echo '<div class="alert alert-danger" role="alert">Error al modificar: ' . $conn->error . '</div>';
    }

    $conn->close();
}
?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
             <div class="form-group">
                <label for="cedula">Cédula:</label>
                <input type="text" name="cedula" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="nombre">Nombre:</label>
                <input type="text" name="nombre" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="apellido">Apellido:</label>
                <input type="text" name="apellido" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="direccion">direccion:</label>
                <input type="text" name="direccion" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="telefono">telefono:</label>
                <input type="text" name="telefono" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="sexo">sexo:</label>
                <input type="text" name="sexo" class="form-control" required>
            </div>
            <div class="form-group">
                <label for="fecha_nacimiento">fecha de nacimiento:</label>
                <input type="date" name="fecha_nacimiento" class="form-control" required>
            </div>

            <!-- Casilla de selección para el año a cursar -->
            <div class="form-group">
                <label for="año_escolar">Año a cursar:</label>
                <select name="año_escolar" class="form-control">
                    <option value="1">Primer Año</option>
                    <option value="2">Segundo Año</option>
                    <option value="3">Tercer Año</option>
                    <option value="4">Cuarto Año</option>
                    <option value="5">Quinto Año</option>

                   
                </select>
            
            </div>
            
            <div class="button-container">
                <button type="submit" name="modificar" class="btn btn-primary">Modificar</button>
               
                <a class="volver-button" href="alumnos.php">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
