<?php
    //include our function
    include 'function.php';

    if(isset($_POST['backup'])){
        //get credentails via post
        $server = 'localhost'; // Corregido
        $username = 'root'; // Corregido
        $password = ''; // Corregido
        $dbname = 'evaluacion'; // Corregido

        //backup and dl using our function
        backDb($server, $username, $password, $dbname);

        exit();
        
    }
    else{
        echo 'Rellena la información de la base de datos';
    }
?>