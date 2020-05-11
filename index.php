<?php
	session_start();
?>

<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="images/igg.png" type="image/png" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />  
		<title>Pandora</title>
		<?php 
            require_once "libreriasindex.php";
        ?>
        <script src="js/logicas_login.js"></script>
    </head>
    <body>
        <div class="container-fluid borde">
            <nav class="navbar fixed-top navbar-light bg_red">
                <span class="tituloHead borde">Sistema | SIGE</span>
                <div class="collapse navbar-collapse borde" id="navbarNavAltMarkup">
                    <div class="col-sm-12 col-lg-12">
                        
                    </div>
                </div>
            </nav>
            <div class="col-sm-12 col-lg-12 borde divbody">
                <div id="contLogos" class="col-sm-12 col-lg-12 borde">
                        <div class="col-sm-12 col-lg-8 ">
                            <img src="images/IG.png" class="logos borde">
                            <img src="images/LogoAO.png" class="logos borde">
                        </div>
                </div>
                <div id="textos">
                    <div class="row">
                        <div class="col-sm-12 col-lg-12 borde">
                            <p class="tituloBody borde">Percepción Local del Riesgo y Capacidad de Respuesta, Álvaro Obregón</p>
                        </div>
                        <div class="col-sm-12 col-lg-12 borde">
                            <p class=" parrafo borde">Consta de un cuestionario dividido en dos partes:</p>
                            <p class=" parrafo borde">1.- Se refiere a la percepción local de riesgo, es decir, el imaginario colectivo que tiene la población acerca de las susceptibles que existen en su comunidad y de su grado de exposición frente a las mismas</p>
                            <p class=" parrafo borde">2. Se enfoca en la capacidad de prevención y de respuesta, la cual se refiere a la preparación antes y después de un evento de las autoridades y de la población, se aplica mediante cuestionario.</p>
                        </div>
                        <div id="boton" class="col-sm-12 col-lg-12">
                            <button id="btnIngresar" class="btn btn-primary centrado btn_ingresar" onclick="login.php">Ingresar</button>
                        </div>
                    </div>
                    
                </div>
            </div>
        </div>
        
    </body>
</html>
