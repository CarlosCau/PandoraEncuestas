<?php
    ob_start();
    session_start();
    //  *************** For PostgreSQL
        $dsn = "pgsql:host=ec2-54-210-128-153.compute-1.amazonaws.com;dbname=d9pdcir9566sg4;port=5432";
        $opt = [
            PDO::ATTR_ERRMODE            => PDO::ERRMODE_EXCEPTION,
            PDO::ATTR_DEFAULT_FETCH_MODE => PDO::FETCH_ASSOC,
            PDO::ATTR_EMULATE_PREPARES   => false
        ];
        $pdo = new PDO($dsn, 'hwlpwrbosdvqpm', '16f1610b3a8ed61ba8fdcfb55d4108bcdbdf36fb411ae932af8994d28ec62e27', $opt);

    include "php_functions.php";
?>
