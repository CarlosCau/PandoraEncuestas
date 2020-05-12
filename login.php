<html>
	<head>
		<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <link rel="icon" href="images/igg.png" type="image/png" />
		<meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1, maximum-scale=1, minimum-scale=1" />  
		<title>Pandora</title>
        <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">    
        <link rel="stylesheet" type="text/css" href="lib/bootstrap/bootstrap.min.css">
        <link rel="stylesheet" type="text/css" href="lib/dataTables/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="lib/dataTables/dataTables.bootstrap4.min.css">
        <link rel="stylesheet" type="text/css" href="lib/alertifyjs/css/alertify.css">
        <link rel="stylesheet" type="text/css" href="lib/alertifyjs/css/themes/bootstrap.css">
        <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/fontawesome.css">
        <link rel="stylesheet" type="text/css" href="lib/fontawesome/css/all.css">  
        <link rel="stylesheet" type="text/css" href="css/estilos_index.css">


        <script src="https://code.jquery.com/jquery-3.5.1.js"></script>
        <script src="lib/bootstrap/popper.min.js"></script>
        <script src="lib/bootstrap/bootstrap.min.js"></script>
        <script src="lib/dataTables/jquery.dataTables.min.js"></script>
        <script src="lib/dataTables/dataTables.bootstrap4.min.js"></script>
        <script src="lib/alertifyjs/alertify.js"></script>
        <script src="js/moment.min.js"></script>

		<script src="js/logicas_login.js"></script>
	</head>
	<body class="fondoOficial">
        <div id="loading">
            <img src="images/loading.gif" class="cargando">
        </div>
		<div class="col-sm-12 col-md-11 col-lg-12">
                <div class="col-sm-12 col-lg-4 cargLogin">
                    <div class="col-sm-12 col-lg-12">
                        <p>Inicio de sesión en Pandora</p>
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <input type="text" id="txt_user" class="form-control form-control-sm"  placeholder="Usuario" autocomplete="off">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <input type="password" id="txt_password" class="form-control form-control-sm" autocomplete="off" placeholder="Contraseña">
                    </div>
                    <div class="col-sm-12 col-lg-12">
                        <button id="btn_login" class="btn btn-primary btn_ingresar centrado">Iniciar Sesión</button>
                    </div>
                
                </div>
		</div>
        <div class="div_by">Sistema Pandora</div>
	</body>
</html>
