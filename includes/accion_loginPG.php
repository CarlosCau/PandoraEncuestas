<?php
session_start();
date_default_timezone_set('America/Mexico_City');

require_once "conexion_pg.php";

$hoyCompleto = date("Y-m-d h:i:s");
$hora = date("h:i:s");

$txt_user = $_POST['txt_user'];
$txt_password = $_POST['txt_password'];

$consultaLog = "SELECT * FROM usuario_sedatu 
                WHERE id_usuario='$txt_user' 
                AND pass_usuario='$txt_password'
                AND estatus ='activo'";

$resultado = pg_query($conexion, $consultaLog);

$valida = pg_num_rows($resultado);

if($valida > 0){
    while ($rowP1 = pg_fetch_array($resultado)) {
        $_SESSION["login"] = "sesion_on";
        $_SESSION["id_usuario"] = $rowP1["id_usuario"];
        $_SESSION["nombre"] = $rowP1["nombre"]." ".$rowP1["ap_paterno"]." ".$rowP1["ap_materno"];
	}
    
    $updateLog = "UPDATE usuario_sedatu
                SET last_log = '$hoyCompleto'
                WHERE id_usuario = '$txt_user'";
    
    $executeQuery = pg_query($conexion, $updateLog);
    
    $insertLog = "INSERT INTO usuario_log(id_usuario,last_log)
                    VALUES('$txt_user','$hoyCompleto')";
    
    $executeLog = pg_query($conexion, $insertLog);
    
    echo "conectado";
}else{
	echo "log_error";
}

?>


