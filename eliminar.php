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
            color: #007BFF;
        }

        .form-group {
            margin-bottom: 20px;
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
<body>
    <div class="container">
        <h1>Eliminar Alumno</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['eliminar'])) {
            $cedula = $_POST['cedula'];

            // Establece la conexión a la base de datos
            $servername = "localhost"; // Cambia esto a la dirección de tu servidor de base de datos
            $username = "root"; // Cambia esto a tu nombre de usuario de base de datos
            $password = ""; // Cambia esto a tu contraseña de base de datos
            $dbname = "evaluacion"; // Cambia esto al nombre de tu base de datos

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Elimina el alumno de la tabla de la base de datos
            $sql = "DELETE FROM alumnos WHERE id_alumno='$cedula'";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Eliminación exitosa</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al eliminar: ' . $conn->error . '</div>';
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <div class="form-group">
                <label for="cedula">Cédula del Alumno a Eliminar:</label>
                <input type="text" name="cedula" class="form-control" required>
            </div>
            <div class="button-container">
                <button type="submit" name="eliminar" class="btn btn-primary">Eliminar</button>
                <a class="volver-button" href="alumnos.php">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
