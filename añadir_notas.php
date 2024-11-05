<!DOCTYPE html>
<html lang="es">
<head>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link href="css/bootstrap.min.css" rel="stylesheet">
    <link href="css/bootstrap-theme.css" rel="stylesheet">
    <script src="js/jquery-3.1.1.min.js"></script>
    <script src="js/bootstrap.min.js"></script>
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
    </style>
</head>
<body>
    <div class="container">
        <h1>Añadir Nota</h1>
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['guardar'])) {
           
            $id_alumno = $_POST['id_alumno'];
            $id_materia = $_POST['id_materia'];
            $lapso= $_POST['lapso'];
            $periodo_escolar= $_POST['periodo_escolar'];
            $año_escolar= $_POST['año_escolar'];
            
            $nota = $_POST['nota'];

            // Establece la conexión a la base de datos
            $servername = "localhost"; // Cambia esto a la dirección de tu servidor de base de datos
            $username = "root"; // Cambia esto a tu nombre de usuario de base de datos
            $password = ""; // Cambia esto a tu contraseña de base de datos
            $dbname = "evaluacion"; // Cambia esto al nombre de tu base de datos

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Inserta los datos en la tabla de la base de datos
            $sql = "INSERT INTO notas (id_alumno, id_materia,lapso,periodo_escolar,año_escolar,nota) VALUES ('$id_alumno', '$id_materia', '$lapso','$periodo_escolar','$año_escolar','$nota')";

            if ($conn->query($sql) === TRUE) {
                echo '<div class="alert alert-success" role="alert">Registro exitoso</div>';
            } else {
                echo '<div class="alert alert-danger" role="alert">Error al registrar: ' . $conn->error . '</div>';
            }

            $conn->close();
        }
        ?>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            
            <div class="form-group">
                <label for="id_alumno">ID del Alumno:</label>
                <input type="text" name="id_alumno" class="form-control" placeholder="Cedula del alumno" required>
            </div>
            <div class="form-group">
                <label for="id_materia">Materia:</label>
                <input type="text" name="id_materia" class="form-control" placeholder="id de la materia (matematica,castellano,etc)" required>
            </div>
            <div class="form-group">
                <label for="lapso">lapso:</label>
                <select name="lapso" class="form-control">
                    <option value="1">Primer lapso</option>
                    <option value="2">Segundo lapso</option>
                    <option value="3">Tercer lapsp</option>
                </select>
            </div>

            <div class="form-group">
                <label for="periodo_escolar">perido escolar:</label>
                <input type="text" name="periodo_escolar" class="form-control" placeholder="periodo_escolar(////-////)" required>
            </div>
           <div class="form-group">
                <label for="año_escolar">Año a cursar:</label>
                <select name="año_escolar" class="form-control">
                    <option value="1">Primer Año</option>
                    <option value="2">Segundo Año</option>
                    <option value="3">Tercer Año</option>
                    <option value="4">Cuarto Año</option>
                    <option value="5">Quinto Año</option>

                    <!-- Agrega más opciones según tus necesidades -->
                </select>
            </div>

            <div class="form-group">
                <label for="nota">nota:</label>
                <input type="text" name="nota" class="form-control" placeholder="nota del alumno en la materia" required>
            </div>
            <div class="button-container">
                <button type="submit" name="guardar" class="btn btn-primary">Guardar</button>
                <a class="volver-button" href="notas.php">Volver</a>
            </div>
        </form>
    </div>
</body>
</html>
