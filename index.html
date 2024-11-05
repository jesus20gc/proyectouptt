<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Iniciar Sesión</title>
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

        .forgot-password {
            margin-top: 10px;
            font-size: 14px;
        }

        .forgot-password a {
            color: #007BFF;
            text-decoration: none;
        }

        .forgot-password a:hover {
            text-decoration: underline;
        }
    </style>
</head>
<body>
    <div class="container">
        <?php
        $showLoginForm = true;

        if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['login'])) {
            $username = $_POST['username'];
            $password = $_POST['password'];

            $servername = "localhost";
            $dbUsername = "root";
            $dbPassword = "";
            $dbname = "evaluacion";

            $conn = new mysqli($servername, $dbUsername, $dbPassword, $dbname);

            if ($conn->connect_error) {
                die("Conexión fallida: " . $conn->connect_error);
            }

            $sql = "SELECT * FROM usuarios WHERE id_usuario='$username' AND contraseña='$password'";
            $result = $conn->query($sql);

            if ($result === false) {
                die("Error en la consulta: " . $conn->error);
            }

            if ($result->num_rows == 1) {
                $row = $result->fetch_assoc();
                $tipoUsuario = $row['tipo_usuario'];

                $showLoginForm = false;
                echo '<h1>Inicio de sesión exitoso. ¡Hola, ' . htmlspecialchars($username) . '!</h1>';
                if ($tipoUsuario === 'administrador') {
                    echo '<p>Eres un administrador.</p>';
                    echo '<form method="POST" action="admin_menu.php">';
                    echo '<button type="submit" name="continue">Continuar al menú de administrador</button>';
                    echo '</form>';
                } elseif ($tipoUsuario === 'usuario') {
                    echo '<p>Eres un usuario regular.</p>';
                    echo '<form method="POST" action="user_menu.php">';
                    echo '<button type="submit" name="continue">Continuar al menú de usuario</button>';
                    echo '</form>';
                } else {
                    echo '<p>Tipo de usuario desconocido.</p>';
                }
            } else {
                echo '<h1>Credenciales inválidas</h1>';
            }

            $conn->close();
        }
        ?>

        <?php if ($showLoginForm): ?>
            <h1>Iniciar Sesión</h1>
            <form method="POST" action="<?php echo $_SERVER['PHP_SELF']; ?>">
                <div class="form-container">
                    <img class="input-icon" src="images/usuario.jpg" alt="">
                    <input type="text" name="username" placeholder="Usuario" required>
                </div>
                <div class="form-container">
                    <img class="input-icon" src="images/contraseña.jpg" alt="">
                    <input type="password" name="password" placeholder="Contraseña" required><br>
                </div> 
        
                <button type="submit" name="login">Iniciar Sesión</button>
            </form>
            <button onclick="location.href='registro.php'">Registro</button>
            <button class="help-button custom-button" onclick="mostrarAyuda()">Ayuda</button>
            <div class="forgot-password">
                <a href="restablecer.php">¿Olvidaste tu contraseña?</a>
            </div>
        <?php endif; ?>
    </div>

    <script>
        function mostrarAyuda() {
            var textoAyuda = "1) Bienvenido al programa de registro de estudiantes y notas del Liceo Ignacio Carrasquero. El primer paso a seguir es el registro de usuario, el cual se debe realizar desde la oficina de la evaluación de dicha institución. Proporciona tu nombre, cédula (la cual será tu usuario) y una contraseña personal de acceso.\n\n";
            textoAyuda += "2) Desde dicho programa, puedes añadir notas de los alumnos. En caso de errores, los administradores (personal del departamento de evaluación) se encargarán de corregir dicha equivocación, ya que como docente, solo puedes añadir notas.\n\n";
            textoAyuda += "3) Para añadir alumnos, haz clic sobre la palabra 'Alumnos', luego sobre el botón 'Añadir Alumnos' y agrega la información que se muestra en pantalla.";
            
            alert(textoAyuda);
        }
    </script>
</body>
</html>
