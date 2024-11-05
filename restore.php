<?php

function restore($host, $user, $pass, $dbname, $file_location) {
    // Conexión a la base de datos
    $conn = mysqli_connect($host, $user, $pass, $dbname);
    
    if (!$conn) {
        die("No se pudo conectar a la base de datos: " . mysqli_connect_error());
    }
    
    // Leer el contenido del archivo SQL
    $sql = file_get_contents($file_location);
    
    // Ejecutar las consultas
    if (mysqli_multi_query($conn, $sql)) {
        echo "La restauración de la base de datos se ha completado correctamente.";
    } else {
        echo "Error al restaurar la base de datos: " . mysqli_error($conn);
    }
    
    // Cerrar la conexión
    mysqli_close($conn);
}

// Parámetros de configuración para la restauración de la base de datos
$server = "localhost";
$username = "root";
$password = "";
$dbname = "evaluacion";
$file_location = "C:/xampp/htdocs/www/evaluacion_backup.sql";

// Restaurar la base de datos utilizando la función restore()
$restore = restore($server, $username, $password, $dbname, $file_location);

header('location:admin_menu.php');

?>