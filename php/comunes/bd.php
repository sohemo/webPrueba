<?php
	
	function conectar ()
	{
		global $conexion;
		
		/* Creamos la conexión */
		$servidor = "localhost";
		$usuario = "u795569006";
		$pass = "0";
		
		$conexion = mysql_connect($servidor, $usuario."_langs", "Parejita".$pass);
		
		if ($conexion == false)
			echo ("ERROR: No ha sido posible la conexión :(<br>");
		/*else
			echo ("INI de la conexión"."<br>");*/
	}
	
	function desconectar ()
	{
		global $conexion;
		
		mysql_close($conexion);
	}
	
?>