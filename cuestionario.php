<?php
    session_start();
    require_once "includes/conexion_pg.php";
    require_once "includes/query_cuestionario_pg.php";
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="images/igg.png" type="image/png" />
        <title>Pandora</title>
        <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />
        <?php 
            require_once "librerias.php";
        ?>
        <script src="js/logicasCuestionario_v2.js"></script>
    </head>
    <body  onload="Startpage()">
        <div id="loading">
            <img src="images/loading.gif" class="cargando">
        </div>
        <div id="principal" class="container-fluid main">
            <nav id="header" class="navbar fixed-top navbar-light bg_red fuenteBlanca">
                 <span class="tituloHead borde">Sistema | SIGE</span>
                 <div class="col-xs-3 div-no-padding"><span class="pull-right">(&plusmn; <span class="info_cur_acc"></span>m)</span></div>
                <button class="navbar-toggler fuenteBlanca" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon fuenteBlanca"></span>
                </button>
                <div class="collapse navbar-collapse borde" id="navbarNavAltMarkup">
                    
                    <div class="col-sm-12 col-lg-4 datosUsuario borde">
                        <div class="row">
                            <div class="col-sm-12 col-lg-1 borde">
                                <img src="images/user.png" class="icono_user">
                            </div>
                            <div class="col-sm-12 col-lg-10 borde">
                                <input id="idUsuario" type="hidden" class="form-control form-control-sm datosUpaxer" value="<?php echo $_SESSION["id_usuario"]; ?>">
                                <input id="nomUsuario" type="hidden" class="form-control form-control-sm datosUpaxer" value="<?php echo $_SESSION["nombre"]; ?>">
                                <div class="col-sm-12 col-lg-12">
                                    <div class="datos_usuario"><?php echo $_SESSION["id_usuario"]; ?></div>
                                </div>
                                <div class="col-sm-12 col-lg-12">
                                    <div class="datos_usuario"><?php echo $_SESSION["nombre"]; ?></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-sm-12 col-lg-8 borde">
                        <div class="navbar-nav derecho borde">
                            <a id="sessionOff" class="nav-item nav-link barraNav" href="#" tabindex="-1"> <span class="fas fa-sign-out-alt textoOrange"></span> Cerrar sesión</a>
                            <input id="numUsuario" type="hidden" class="form-control form-control-sm" value="<?php echo $id_usuario; ?>">
                        </div>
                    </div>
                    
                </div>
            </nav>
            <div class="row">
                <div id="mapa" class="col-sm-12 col-lg-12 borde">
                    <div id="divMap" class="borde"><!--Capa del Mapa-->
                        <!--<div class="botonMapa">
                                <button id="btnAutolocate" class="btn"></button>
                                <i id="divCross" class="fa fa-crosshairs fa-2x"></i>
                        </div>-->
                        
                        <div id="slider" class="col-xs-2" >
                            <div id="sldrAutolocate" >
                                <div  id="contenedorSlider">
                                    <input id="numAutolocate" type="range" min="1" max="31" step="30" value="1">
                                </div>
                                <div >
                                    <input class="sliderText " type="text"  placeholder=" On   Off ">
                                    
                                </div>
                            </div>
                        </div>
                        
                    </div>
                    <div id="altaPunto" class="borde"><!--Capá de Captura de Punto-->                    
                        <input type="text" id="encuestador" class="form-control form-control-lg camposPuntos" placeholder="Encuestador" value="<?php echo $_SESSION["id_usuario"]; ?>" disabled>
                        
                        <input type="text" id="cometarios" class="form-control form-control-lg camposPuntos" placeholder="Comentarios">
                        
                        <input type="text" name="lat" id="lat" class="form-control form-control-lg camposPuntos" placeholder="Latitud" disabled>
                        
                        <input type="text" name="lng" id="long" class="form-control form-control-lg camposPuntos" placeholder="Longitud" disabled>
                        
                        <button id="btnIngresar" class="btn btn-primary centrado btn_ingresar">Levantar Encuesta</button>
                    </div>
                    
                    <footer id="footer"><!--Botones a pie de Pagina-->
                        <div class="btn-group btn-group-justified row">
                            <div class="btn-group col-4 borde">
                                <button id="vistamap" class="btn btn-light btnMenu"><span class="fas fa-globe-americas"></span></button>
                            </div>
                            <div class="btn-group col-4 borde">
                                <button id="addPoint" class=" btn btn-light btnMenu"><span class="fas fa-map-marker-alt"></span></button>
                            </div>
                            <div class="btn-group col-4 borde">
                                <button id="info" class="btn btn-light btnMenu"><span class="fas fa-info"></span></button>
                            </div>
                        </div>
                    </footer>
                    
                </div>
                    
                <div id="cuestionario" class="col-sm-12 col-lg-12 borde"><!--Capa de Cuestionario-->
                    <div class="row marcoCuestionario">
                        <h5>Cuestionario</h5>
                        <div id="mensaje" class="mensaje oculto">
                            Encuesta finalizada
                        </div>
                        <?php
                                echo "
                                    <input id='totalPreguntas' type='text' class='form-control form-control-sm oculto' value='$numPreguntas'>
                                    <input id='finalPregunta' type='text' class='form-control form-control-sm oculto' value='$final'>";

                                for($x=1; $x<=$numPreguntas; $x++){

                                    echo "<div id='contePrincipal$x' class='col-sm-12 col-lg-12 borde contPadre'>"; /*Div Contenderor Pregunta*/

                                    $queryPreguntas = "SELECT * 
                                                        FROM cuestionario_sedatu
                                                        WHERE nivel='pregunta'
                                                        AND orden = $x
                                                        ORDER BY orden ASC";
                                    
                                    $resultadoPreguntas = pg_query($conexion, $queryPreguntas);


                                     while($pregunta= pg_fetch_array($resultadoPreguntas)){
                                        $tipo = $pregunta[6];
                                        $orden = $pregunta[1];
                                        $numPregunta = $pregunta[0];

                                        if($orden>1){
                                            echo "<div id='contenedor$numPregunta' class='col-sm-12 col-lg-12 oculto preguntaCont'>
                                                    <input id='pregOrigen$pregunta[0]' type='text' class='oculto' value=''><br>
                                                    <input id='pregAnt$pregunta[0]' type='text' value='$pregunta[4]' class='oculto'><br>
                                                    <input id='pregSig$pregunta[0]' type='text' value='$pregunta[5]' class='oculto'>
                                                    <input id='numPreg$pregunta[0]' type='text' value='$pregunta[1]' class='oculto'>
                                                    ";
                                        }else{
                                            echo "<div id='contenedor$numPregunta' class='col-sm-12 col-lg-12 preguntaCont'>
                                                 <input id='pregOrigen$pregunta[0]' type='text' class='oculto' value=''><br>
                                                 <input id='pregAnt$pregunta[0]' type='text' value='$pregunta[4]' class='oculto'><br>
                                                 <input id='pregSig$pregunta[0]' type='text' value='$pregunta[5]' class='oculto'>
                                                 <input id='numPreg$pregunta[0]' type='text' value='$pregunta[1]' class='oculto'>
                                            ";
                                        }

                                        echo "<div id='pregunta' class='col-sm-12 col-lg-12 borde pregunta'>$pregunta[0].- "."$pregunta[2]</div>
                                              <input id='pregAnt$pregunta[0]' type='text' value='$pregunta[5]' class='oculto'>
                                                ";

                                        if($tipo=="unica" or $tipo=="multiple" or $tipo=="dicotomica"){
                                            
                                            
                                            $queryResp= "SELECT * 
                                                            FROM cuestionario_sedatu
                                                            WHERE nivel='resp'
                                                            AND padre='$numPregunta'";
                                            
                                            $resultadorespuestas = pg_query($conexion, $queryResp);

                                            while($resp=pg_fetch_array($resultadorespuestas)){
                                                if($tipo=="dicotomica" or $tipo=="unica"){
                                                    echo "<div class='form-check col-sm-12 col-lg-12 respContOpcion borde'>
                                                          <input id='respuesta$resp[7]' name='respuesta$resp[0]' class='form-check-input radioBtn respuesta borde respContOpcion' type='radio' indice='$resp[0]' value='$resp[2]' origen='$resp[4]' destino='$resp[5]' ponderador='$resp[8]'>
                                                          <label class='form-check-label' for='exampleRadios1'>$resp[2]</label>
                                                        </div>";
                                                }elseif($tipo=="multiple"){
                                                    echo "<div class='form-check col-sm-12 col-lg-12 respContOpcion'>
                                                          <input id='respuesta$resp[7]' class='form-check-input checkBtn respuesta' type='checkbox' value='$resp[2]' indice='$resp[0]' origen='$resp[4]' destino='$resp[5]'>
                                                          <label class='form-check-label' for='defaultCheck1'>$resp[2]</label>
                                                        </div>";
                                                }
                                            }
                                            
                                        }elseif($tipo=="abierta"){
                                            echo "<div class='col-sm-12 col-lg-12 respContLibre'>
                                                    <input id='respuesta$pregunta[7]' type='text' class='form-control form-control-sm libre respuesta' numero='$pregunta[1]' origen='$pregunta[4]' destino='$pregunta[5]'>
                                                 </div>";
                                        }elseif($tipo=="combo"){
                                            
                                             echo "<div class='col-sm-12 col-lg-12 respContLibre'>
                                                    <select id='respuesta$pregunta[7]' class='form-control form-control-sm combo'>
                                                        <option value='00'>Tipificación..</option>";
                                                    while($datos=mysqli_fetch_row($queryCodigos)){ 
                                                        echo '<option value="'.$datos[1]."-".$datos[2].'">'.$datos[1]."-".$datos[2].'</option>';
                                                    } 
                                            
                                            echo "</select>
                                                    </div>";
                                        }elseif($tipo=="informativa"){
                                            
                                        }
                                        
                                        echo "<br>";
                                        if($orden>1){
                                            echo "<button id='btnAnterior$pregunta[0]' type='button' class='btn btn-primary btn-clasico anterior' value='$pregunta[4]' tipo='$pregunta[6]'>Anterior</button>";
                                        }else{
                                            echo "<button id='btnAnterior$pregunta[0]' type='button' class='btn btn-primary btn-clasico anterior oculto' value='$pregunta[4]' tipo='$pregunta[6]'>Anterior</button>";
                                        }
                                        
                                        if($tipo=="abierta" or $tipo=="combo"){
                                            echo"<button id='btnSiguiente$pregunta[0]' type='button' class='btn btn-primary btn-clasico siguiente' value='$pregunta[5]' tipo='$pregunta[6]' indice='$pregunta[7]' tabindex=1>Siguiente</button>";
                                            
                                        }else{
                                            echo"<button id='btnSiguiente$pregunta[0]' type='button' class='btn btn-primary btn-clasico siguiente' value='$pregunta[5]' tipo='$pregunta[6]' indice='$pregunta[0]' tabindex=1>Siguiente</button>";
                                        }
                                         
                                        echo "</div>";
                                     }
                                echo "</div>"; /*Div Contenderor Pregunta*/
                                }
                        ?>
                    </div>
                    <div class="botones borde">
                        <button id="btnGuardar" type="button" class="btn btn-primary btn_ingresar centrado oculto" value="">Guardar</button>
                    </div>
                </div>
                
            </div>
        </div>
        

    </body>
</html>
