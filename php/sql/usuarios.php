<?php
	
	/* Identifica un usuario por nombre y pass, no hay otra posibilidad */
	function identificacionUsuario ()
	{
	$fichDebug=fopen("identificacionUsuario".dameFechaYYYYMMDDHHMMSS('YYYYMMDDHHMMSS').".txt","a") or die("Problemas en la creacion");
	fputs($fichDebug,"** INI - usuarios.php **\n");
		global $conexion;
		global $nombre;
		global $contrasena;
		global $resultado;
		
		if ($nombre == "" || $contrasena == "")
		{
			/* Esto es un error ya que tanto el nombre como la contraseña tienen que estar informadas.
			   En principio la comprobación se realiza en otro punto, pero así nos evitamos problemas. */
			echo ("ERROR: El nombre y/o la contraseña no están informados.<br>");
		}
		else
		{
			if ($conexion == true)	/* Como hemos incluido el php de la conexión podemos utilizar directamente la variable, en este caso: $conexion */
			{
				if (mysql_select_db ("u795569006_langs", $conexion))
				{
					/* Montamos nuestra select.
						Recordar que si está informado el nombre solo se retrona un 
					*/
					$consulta = "SELECT * FROM USUARIOS WHERE NOMBRE = '".$nombre."' AND PASS = '".$contrasena."' ";
					
					//echo ("consulta ".$consulta."<br>");
					
					/* Ejecutamos la consulta y nos guardamos el resultado */
					$resultado = mysql_query ($consulta, $conexion);
					
					if ($resultado)
					{
						/* Solo hemos identificado al usuario si hemos localizado un registro.  No debería ser necesario el control, pero lo ponemos porsiaca. 
						if (mysql_num_rows ($resultado) == 1)
							echo ("El usuario ".$nombre." _ ".mysql_result ($resultado, 0, mysql_field_name ($resultado, 0))." está conectado.");
						else
							echo ("ERROR: Alguno de los datos no es correcto.");*/
					}
					else
					{
						echo ("ERROR: mysql_errno = ".mysql_errno($conexion)." mysql_error = ".mysql_error($conexion)."<br>");
					}
				}
			}
			else
				echo ("ERROR: Se ha perdido la conexión :(<br>");
		}
		
		fputs($fichDebug,"** FIN - usuarios.php **\n");
		fclose($fichDebug);
	}
	
	// /* Damos de alta un nuevo usuario con nombre y email */
	// function altaUsuario ()
	// {
		// global $conexion;
		// global $nombre;
		// global $email;
		// global $resultado;
		
		// if ($nombre == "" || $email == "")
		// {
			// /* Esto es un error ya que tanto el nombre como la contraseña tienen que estar informadas.
			   // En principio la comprobación se realiza en otro punto, pero así nos evitamos problemas. */
			// echo ("ERROR: El nombre y/o el email no están informados.<br>");
		// }
		// else
		// {
			// if ($conexion == true)	/* Como hemos incluido el php de la conexión podemos utilizar directamente la variable, en este caso: $conexion */
			// {
				// if (mysql_select_db ("u795569006_langs", $conexion))
				// {
					// /* Montamos nuestra select.
						// Recordar que si está informado el nombre solo se retrona un 
					// */
					// $consulta = "INSERT INTO USUARIOS (NOMBRE, PASS, EMAIL, PERMISOS, FEC_ALTA) VALUES ";
					// $consulta .= "('".$nombre."', '".PASS."', '".$email."', 'C', '".dameFechaYYYYMMDDHHMMSS('DD/MM/YYYY HH:MM:SS')."')";
					
					// echo ("consulta ".$consulta."<br>");
					
					// /* Ejecutamos la consulta y nos guardamos el resultado */
					// $resultado = mysql_query ($consulta, $conexion);
					
					// if ($resultado)
					// {
						// /* Solo hemos identificado al usuario si hemos localizado un registro.  No debería ser necesario el control, pero lo ponemos porsiaca. 
						// if (mysql_num_rows ($resultado) == 1)
							// echo ("El usuario ".$nombre." _ ".mysql_result ($resultado, 0, mysql_field_name ($resultado, 0))." está conectado.");
						// else
							// echo ("ERROR: Alguno de los datos no es correcto.");*/
					// }
					// else
					// {
						// echo ("ERROR: mysql_errno = ".mysql_errno($conexion)." mysql_error = ".mysql_error($conexion)."<br>");
					// }
				// }
			// }
			// else
				// echo ("ERROR: Se ha perdido la conexión :(<br>");
		// }
	// }
	
?>
