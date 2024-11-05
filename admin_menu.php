<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Menú de Selección</title>
    <style>
        body {
            font-family: Arial, sans-serif;
            background-image: url('images/liceo.jpg'); /* Imagen de fondo */
            background-size: cover;
            background-position: center;
            text-align: center;
            margin: 0;
            padding: 0;
            position: relative;
            height: 100vh; /* Ajusta la altura del cuerpo para ocupar toda la ventana */
        }

        .top-bar {
            width: 100%;
            background-color: #78D15C; 
            padding: 10px 0; /* Aumenta el espacio vertical dentro de la barra */
            display: flex;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            z-index: 100; /* Asegurar que esté por encima del contenido */
        }

        .menu-button {
            background: none;
            border: none;
            cursor: pointer;
            z-index: 101; /* Asegurar que esté por encima del contenido */
        }

        .menu-button img {
            width: 40px;
            height: 40px;
        }

        .exit-button {
            background: none;
            border: none;
            cursor: pointer;
            z-index: 101; /* Asegurar que esté por encima del contenido */
        }

        .exit-button img {
            width: 40px;
            height: 40px;
        }

        .menu {
            display: none;
            position: absolute;
            top: 70px; /* Ajusta este valor para bajar el menú */
            left: 10px; /* Ajusta este valor para posicionar el menú principal a la izquierda */
            width: 250px; /* Ajusta este valor para hacer el menú principal más ancho si es necesario */
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 102; /* Asegurar que esté por encima del contenido */
        }

        .exit-menu {
            display: none;
            position: absolute;
            top: 70px; /* Ajusta este valor para bajar el menú */
            right: 10px; /* Ajusta este valor para posicionar el menú de "Salir" a la derecha */
            width: 250px; /* Ajusta este valor para hacer el menú de "Salir" más ancho si es necesario */
            background-color: #fff;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1);
            z-index: 102; /* Asegurar que esté por encima del contenido */
        }

        .menu-bar, .exit-menu-bar {
            width: 100%;
            background-color: #78D15C;
            height: 50px;
            border-top-left-radius: 5px;
            border-top-right-radius: 5px;
        }

        .menu a, .exit-menu a {
            text-decoration: none;
            color: #000000;
            font-weight: bold;
            font-size: 18px;
            display: block;
            padding: 15px 20px; /* Ajusta este valor para cambiar el espacio de las opciones */
            transition: background-color 0.3s;
        }

        .menu a:hover, .exit-menu a:hover {
            background-color: #f0f0f0;
        }
    </style>
</head>
<body>
    <div class="top-bar">
        <!-- Botón de menú original -->
        <button class="menu-button" onclick="toggleMenu()">
            <img src="images/menu.png" alt="Menú">
        </button>
        
        <!-- Nuevo botón "Salir" -->
        <button class="exit-button" onclick="toggleExitMenu()">
            <img src="images/salir.png" alt="Salir">
        </button>
    </div>

    <!-- Menú desplegable del botón "Salir" -->
    <div class="exit-menu" id="exit-menu">
        <div class="exit-menu-bar"></div>
        <a href="cerrar_sesion.php">Cerrar sesión</a>
        <a href="respaldo.php">Restaurar Base de Datos</a>
        <a href="respaldo.html">Respaldar Base de Datos</a>
    </div>

    <!-- Menú desplegable original -->
    <div class="menu" id="main-menu">
        <div class="menu-bar"></div>
        <a href="alumnos.php">Alumnos</a>
        <a href="año.php">Años</a>
        <a href="notas.php">Notas</a>
        <a href="reprobados.php">Reprobados</a> <!-- Nuevo botón "Reprobados" -->
    </div>

    <script>
        // Función para alternar la visibilidad del menú principal
        function toggleMenu() {
            var menu = document.getElementById('main-menu');
            var exitMenu = document.getElementById('exit-menu');

            if (menu.style.display === 'block') {
                menu.style.display = 'none';
            } else {
                menu.style.display = 'block';
                exitMenu.style.display = 'none'; // Ocultar el otro menú al mostrar este
            }
        }

        // Función para alternar la visibilidad del menú de salida
        function toggleExitMenu() {
            var exitMenu = document.getElementById('exit-menu');
            var menu = document.getElementById('main-menu');

            if (exitMenu.style.display === 'block') {
                exitMenu.style.display = 'none';
            } else {
                exitMenu.style.display = 'block';
                menu.style.display = 'none'; // Ocultar el otro menú al mostrar este
            }
        }

        // Evento para cerrar los menús si se hace clic fuera de ellos
        window.onclick = function(event) {
            var exitMenu = document.getElementById('exit-menu');
            var menu = document.getElementById('main-menu');

            if (!event.target.matches('.exit-button') && !event.target.matches('.exit-button img')) {
                if (exitMenu.style.display === 'block') {
                    exitMenu.style.display = 'none';
                }
            }

            if (!event.target.matches('.menu-button') && !event.target.matches('.menu-button img')) {
                if (menu.style.display === 'block') {
                    menu.style.display = 'none';
                }
            }
        }
    </script>
</body>
</html>
