<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Acceso de Registro</title>
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

        .message {
            margin-top: 10px;
            padding: 10px;
            background-color: #f2f2f2;
            border-radius: 5px;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['access'])) {
            $access_password = $_POST['access_password'];

            // Verifica la contraseña de acceso
            if ($access_password === 'carrasquero') {
                // Contraseña de acceso correcta, redirige a la página de registro de usuarios
                header("Location: registro_usuario.php");
                exit();
            } else {
                // Contraseña de acceso incorrecta
                echo '<h1>Credenciales inválidas</h1>';
            }
        }
        ?>
        <h1>Acceso de Registro</h1>
        <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
            <input type="password" name="access_password" placeholder="Contraseña de Acceso" required><br>
            <button type="submit" name="access">Acceder</button>
        </form>
    </div>
</body>
</html>
