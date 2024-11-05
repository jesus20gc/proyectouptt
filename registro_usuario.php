<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registro de Usuario</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-color: #f0f0f0;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
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
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
        }

        h1 {
            color: #333;
        }

        input[type="text"], input[type="password"], select {
            padding: 10px;
            margin: 10px 0;
            width: 100%;
            border: 1px solid #ccc;
            border-radius: 5px;
        }

        button {
            background-color: #007BFF;
            color: #fff;
            border: none;
            padding: 10px 20px;
            margin: 10px 0;
            font-size: 16px;
            cursor: pointer;
            border-radius: 5px;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        .message {
            margin-top: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
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
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['registro'])) {
            $cedula = $_POST['cedula'];
            $nombre = $_POST['nombre'];
            $contraseña = $_POST['contraseña'];
            $tipoUsuario = $_POST['tipo_usuario']; // Nuevo campo para el tipo de usuario

            // Establece la conexión a la base de datos (asegúrate de llenar los detalles correctos)
            $servername = "localhost"; // Cambia esto a la dirección de tu servidor de base de datos
            $username = "root"; // Cambia esto a tu nombre de usuario de base de datos
            $password = ""; // Cambia esto a tu contraseña de base de datos
            $dbname = "evaluacion"; // Cambia esto al nombre de tu base de datos

            $conn = new mysqli($servername, $username, $password, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            // Inserta los datos en la tabla de la base de datos, incluyendo el tipo de usuario
            $sql = "INSERT INTO usuarios (id_usuario, nombre_usuario, contraseña, tipo_usuario) VALUES ('$cedula', '$nombre', '$contraseña', '$tipoUsuario')";

            if ($conn->query($sql) === TRUE) {
                echo '<h1>Registro exitoso</h1>';
            } else {
                echo '<h1>Error al registrar: ' . $conn->error . '</h1>';
            }

            $conn->close();
        }
        ?>
        <h1>Registro de Usuario</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="text" name="cedula" placeholder="Cédula" required><br>
            <input type="text" name="nombre" placeholder="Nombre" required><br>
            <input type="password" name="contraseña" placeholder="Contraseña" required><br>

            <!-- Agregar una casilla de selección para el tipo de usuario -->
            <label for="tipo_usuario">Tipo de usuario:</label>
            <select name="tipo_usuario" id="tipo_usuario">
                <option value="administrador">administrador</option>
                <option value="usuario">usuario</option>
            </select>

            <button type="submit" name="registro">Registrar</button>
            <a class='button' href='nuevo.php'>Volver</a>
        </form>
    </div>
</body>
</html>
