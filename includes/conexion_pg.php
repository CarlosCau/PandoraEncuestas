<?php
    $dbhost = "ec2-54-210-128-153.compute-1.amazonaws.com";
    $dbuser = "hwlpwrbosdvqpm";
    $dbpass = "16f1610b3a8ed61ba8fdcfb55d4108bcdbdf36fb411ae932af8994d28ec62e27";
    $db = "d9pdcir9566sg4";
    $port = "5432";

    $conexion_pg = "host=$dbhost port=$port dbname=$db user=$dbuser password=$dbpass";
    $conexion = pg_connect($conexion_pg);

    if(!$conexion) {
        echo "Error: No se ha podido conectar a la base de datos\n";
    }

?>