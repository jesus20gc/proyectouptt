<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restablecer Contraseña</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            margin: 0;
            padding: 0;
            display: flex;
            justify-content: center;
            align-items: center;
            height: 100vh;
            background-color: #f0f0f0;
            position: relative;
            overflow: hidden;
        }

        body::before {
            content: "";
            position: absolute;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: url('images/liceo.jpg') no-repeat center center;
            background-size: cover;
            opacity: 0.38; /* Ajusta este valor para la transparencia deseada */
            z-index: -1; /* Coloca el fondo detrás del contenido */
        }

        .container {
            text-align: center;
            background-color: #fff;
            padding: 20px;
            border-radius: 10px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            width: 300px;
            position: relative;
            z-index: 1; /* Asegura que el contenido esté por encima del fondo */
        }

        h1 {
            color: #333;
        }

        input[type="text"],
        input[type="password"] {
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

        .help-button {
            position: center;
            top: 10px;
            right: 10px;
            background-color: #00FF00;
            color: #00FF00;
            border: none;
            padding: 8px 16px;
            font-size: 14px;
            cursor: pointer;
            border-radius: 5px;
        }

        .custom-button {
            background-color: #059E00;
            color: white;
            font-weight: bold;
        }

        .contenido {
            display: block;
        }

        .registro {
            display: none;
        }

        .form-container {
            display: flex;
            align-items: center;
        }

        .form-container input {
            margin-left: 10px;
        }

        .form-container img.input-icon {
            width: 30px;
        }

        .input-icon-clave {
            width: 40px;
        }
    </style>
</head>
<body>
    <div class="container">
        <h1>Restablecer Contraseña</h1>
        <?php
        $showVerificationForm = true;
        $showPasswordForm = false;
        $username = "";
        $userid = "";

        if ($_SERVER['REQUEST_METHOD'] === 'POST') {
            $servername = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbname = "evaluacion";
            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            if (isset($_POST['verify'])) {
                $userid = $_POST['userid'];
                $username = $_POST['username'];

                $sql = "SELECT * FROM usuarios WHERE id_usuario='$userid' AND nombre_usuario='$username'";
                $result = $conn->query($sql);

                if ($result && $result->num_rows == 1) {
                    $showVerificationForm = false;
                    $showPasswordForm = true;
                } else {
                    echo '<p style="color: red;">Credenciales inválidas. Inténtelo de nuevo.</p>';
                }
            }

            if (isset($_POST['reset'])) {
                $userid = $_POST['userid'];
                $newPassword = $_POST['new_password'];

                $sql = "UPDATE usuarios SET contraseña='$newPassword' WHERE id_usuario='$userid'";
                if ($conn->query($sql) === TRUE) {
                    header("Location: nuevo.php");
                    exit();
                } else {
                    echo '<p style="color: red;">Error al actualizar la contraseña. Inténtelo de nuevo.</p>';
                }
            }

            $conn->close();
        }
        ?>

        <?php if ($showVerificationForm): ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-container">
                    <img class="input-icon" src="images/usuario.jpg" alt="">
                    <input type="text" name="userid" placeholder="Inserte su cédula" required>
                </div>
                <div class="form-container">
                    <img class="input-icon" src="images/usuario.jpg" alt="">
                    <input type="text" name="username" placeholder="Inserte su nombre" required><br>
                </div> 
                <button type="submit" name="verify">Recuperar</button>
            </form>
        <?php endif; ?>

        <?php if ($showPasswordForm): ?>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <input type="hidden" name="userid" value="<?php echo htmlspecialchars($userid); ?>">
                <div class="form-container">
                    <img class="input-icon" src="images/usuario.jpg" alt="">
                    <input type="text" name="username" value="<?php echo htmlspecialchars($username); ?>" readonly>
                </div>
                <div class="form-container">
                    <img class="input-icon" src="images/usuario.jpg" alt="">
                    <input type="text" name="userid" value="<?php echo htmlspecialchars($userid); ?>" readonly><br>
                </div> 
                <div class="form-container">
                    <img class="input-icon input-icon-clave" src="images/contraseña.jpg" alt="">
                    <input type="password" name="new_password" placeholder="Inserte su nueva contraseña" required><br>
                </div>
                <button type="submit" name="reset">Restablecer Contraseña</button>
            </form>
        <?php endif; ?>
    </div>
</body>
</html>
