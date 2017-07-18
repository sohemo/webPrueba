<?php
	
	function dameFechaYYYYMMDDHHMMSS($formato)
	{
		$fecha = getdate();
		
		$ano = $fecha['year'];
		$mes = $fecha['mon'];
		if (strlen ($mes) < 2)
			$mes = "0".$mes;
		$dia = $fecha['mday'];
		if (strlen ($dia) < 2)
			$dia = "0".$dia;
		$hora = $fecha['hours'];
		if (strlen ($hora) < 2)
			$hora = "0".$hora;
		$min = $fecha['minutes'];
		if (strlen ($min) < 2)
			$min = "0".$min;
		$seg = $fecha['seconds'];
		if (strlen ($seg) < 2)
			$seg = "0".$seg;
		
		switch ($formato)
		{
			case 'YYYYMMDDHHMMSS':
				$fecha = $ano.$mes.$dia.$hora.$min.$seg;
				break;
			case 'DD/MM/YYYY HH:MM:SS':
				$fecha = $dia.'/'.$mes.'/'.$ano." ".$hora.":".$min.":".$seg;
				break;
		}
		
		return $fecha;
	}
	
	function enviarEmail ()
	{
		mail ("soniahmenglish@gmail.com", "pruebas IdentUsuario ".dameFechaYYYYMMDDHHMMSS(), utf8_decode("Hola!!!!\nHemos ejecutado la gestion de usuarios.\nSaluditos"), "Enviado por:sohemo73@gmail.com");
	}
	
?>
