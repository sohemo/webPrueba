<?php
	/* GIT GIT GIT GIT Vamos a añadir todos los phps que necesitamos para realizar las operaciones */
	include ("comunes/bd.php");
	include ("comunes/funcionesComunes.php");
	include ("sql/usuarios.php");
	
	$fichDebug=fopen("debugConexionINI".dameFechaYYYYMMDDHHMMSS('YYYYMMDDHHMMSS').".txt","a") or die("Problemas en la creacion");
	fputs($fichDebug,"** INI - conexionUsuarios.php **\n");
	
	/* Estas variables las vamos a utilizar para conectarnos a la BD, se accederá a ella como global */
	$conexion = "";
	$resultado;
	
	conectar ();
	
	if ($conexion == true)
	{
		/* Tenemos conexión con la BD */
		/* A estas dos variables también se accederá de forma global desde las funciones */
		$nombre = $_POST['nombre'];
		$contrasena = $_POST['contrasena'];
		
		identificacionUsuario ();
		
		/* Vamos a tratar los datos de retorno */
		if (mysql_num_rows ($resultado) == 1)
		{
			/* Hemos identificado al usuario */
			/*$datosRetorno['nombreResult'] = "Número registros ".mysql_num_rows ($resultado);
			$datosRetorno['contrasenaResult'] = "Hemos recibido como contraseña ".$contrasena;*/
			$datosRetorno['codError'] = "00";	/* OK */
			$datosRetorno['numFilas'] = mysql_num_rows ($resultado);
			
			$numCampos = mysql_num_fields ($resultado);
			
			fputs($fichDebug,"\tnumCampos = ".$numCampos."\n");
			
			$registro = mysql_fetch_row ($resultado);
			
			fputs($fichDebug,"\t\t\tAntes for\n");
			
			for ($j = 0; $j < $numCampos; $j++)
			{
				/* **NOTA** Mirar http://php.net/manual/es/function.mysql-field-name.php */
				$nomCampo = mysql_field_name ($resultado, $j);
				fputs($fichDebug,"\t\t".$nomCampo." = ".$registro[$j]."\n");
				if ($nomCampo == "NOMBRE") || ($nomCampo == "EMAIL'")
					$datosRetorno[$nomCampo] = $registro[$j];
				}
			}
			
			fputs($fichDebug,"\t\t\tDespués for\n");

			echo json_encode($datosRetorno);
		}
		else
		{
			if (mysql_num_rows ($resultado) != 1)
			{
				$datosRetorno['codError'] = "01";
				$datosRetorno['descError'] = "No se ha identificado al usuario, algún dato es erróneo.";
				
				echo json_encode($datosRetorno);
			}
		}
		
		/* Desconectamos la BD antes de salir */
		desconectar ();
	}
	
	fputs($fichDebug,"** FIN - conexionUsuarios.php **\n");
	fclose($fichDebug);
	
?>
