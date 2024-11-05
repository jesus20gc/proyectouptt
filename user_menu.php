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
            position: relative;
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

        .backup-button, .restore-button {
            background-color: #007BFF;
            color: #fff;
            padding: 10px 20px;
            border-radius: 5px;
            text-decoration: none;
            position: fixed;
            bottom: 20px;
            right: 20px;
        }

        .restore-button {
            background-color: #FF6600; 
            bottom: 60px; 
        }
        a.button {
            text-decoration: none;
            background-color: #DA0E0E;
            color: #fff;
            padding: 8px 16px;
            border-radius: 5px;
            display: inline-block;
            margin-top: 400px;
        }

        a.button:hover {
            background-color: #FF4000;
        }
    </style>
</head>
<body>
    <h1>Menú de selección:</h1>
    <ul>
        <li><a href="alumnos_normal.php?tipo=user">Alumnos</a></li>
        <li><a href="año.php">Años</a></li>
        <li><a href="notas.php">Notas</a></li>
    </ul>
     <?php 
    echo  "<br>";
    echo "<a class='button' href='nuevo.php'> Cerrar sesion</a>"; 
    ?>
</body>
</html>
