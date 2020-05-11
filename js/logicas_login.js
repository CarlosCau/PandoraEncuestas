function Startpage() {

}
$(document).ready(function(){
    
    $("#btnIngresar").click(function(){
        $(location).attr('href',"login.php");
    })
    
	$("#btn_login").click(function(){
		var txt_user = $("#txt_user").val();
		var txt_password = $("#txt_password").val();
        
        $("#loading").css("display","block");

		if(txt_user=="" || txt_password==""){
			alertify.alert('<font face=Arial color=Red>ERROR</font>', '<font face=Arial>¡Hey, Existen campos sin información!</font>');
		}
		else{
			$.post("includes/accion_loginPG.php", {
				txt_user:txt_user,
				txt_password:txt_password
			}, function(respuesta){
				if(respuesta.trim()=="log_error"){
					$("#txt_user").val("");
					$("#txt_password").val("");
					alertify.alert('<font face=Arial color=Red>ERROR</font>', '<font face=Arial>¡El Usuario o la contraseña son incorrectos!</font>');
                    $("#loading").css("display","none");
				}
				else{
                    alertify.success('<font face="Roboto">Sesión Iniciada</font>');
                    setTimeout(function(){
                        $("#loading").css("display","none");
					    $(location).attr('href',"cuestionario.php");
                    }, 1000);
				}
			})
		}
	})
})