		
	function pageCargada ()
	{
		alert ("Página carga ocultamos bloque Registro");
		$('#infoRegistro').hide();
		
		$('#btnNuevoUsu').click (ventanaNuevoUsuario);
	}
	
	function ventanaNuevoUsuario ()
	{
		$('#infoRegistro').show();
		$('#infoConexion').hide();
	}
	
	function valConexion()
	{
		/* Esta función valida los datos del formulario */
		var nombre = $("#nombre").val();
		var contrasena = $("#contrasena").val();
		
		if ((nombre == "") || (contrasena == ""))
		{
			alert ("Es obligatorio informar el nombre y la contraseña.");
			return false;
		}
		
		return true;
	}
	
	function tratarError(e)
	{
		alert ("Vamos a tratar posible error e.statusText='"+e.statusText+"'");
	}
	
	function tratarSalidaConexion(r)
	{
		alert ("Vamos a tratar la salida.");
		$('#formConexion').hide();
		$("#conexion").html("Está conectado "+r.nombre+" eMail "+r.eMail+" permisos "+r.PERMISOS);
	}
	
	function iniciarConexion()
	{
		/*var nombre = document.getElementById("nombre").value;
		var contrasena = document.getElementById("contrasena").value;*/
		alert ("iniciarConexion() nombre "+$("#nombre").val());
		/* Preparamos los datos para enviar al servidor */
		var datosEnvio = {nombre: $("#nombre").val(), contrasena: $("#contrasena").val()};
		alert ("Antes POST");
		/* Enviamos la petición */
		var post = $.post ('php/conexionUsuarios.php', datosEnvio, tratarSalidaConexion, 'json');
		alert ("Después POST");
		/* Tratamos un posible error */
		post.error (tratarError);
	}
	
	// function valRegistro()
	// {
		// /* Esta función valida los datos del formulario */
		// var nombre = $("#nombre").val();
		// var email = $("#email").val();
		
		// if ((nombre == "") || (email == ""))
		// {
			// alert ("Es obligatorio informar el nombre y la email.");
			// return false;
		// }
		
		// return true;
	// }
	
	// function tratarSalidaRegistro(r)
	// {
		// alert ("Vamos a tratar la salida.");
		// $('#formRegistro').hide();
		// $("#registro").html("Recibirá un email en la dirección "+r.eMail+" con su contraseña");
	// }
	
	// function registroUsuario()
	// {
		// /*var nombre = document.getElementById("nombre").value;
		// var contrasena = document.getElementById("contrasena").value;*/
		
		// /* Preparamos los datos para enviar al servidor */
		// var datosEnvio = {nombre: $("#nombre").val(), email: $("#email").val()};
		
		// /* Enviamos la petición */
		// var post = $.post ('php/registroUsuarios.php', datosEnvio, tratarSalidaRegistro, 'json');
		
		// /* Tratamos un posible error */
		// post.error (tratarError);
	// }
