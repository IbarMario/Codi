<?php
	// http://www.thiengo.com.br
	// Por: Vinícius Thiengo
	// Em: 25/11/2013
	// Versão: 1.0
	// cliente.php
	include('../nusoap/lib/nusoap.php');		
	//$cliente = new nusoap_client('http://localhost/vinicius/thiengo/doc/projects/web-service-php-nusoap/servidor.php?wsdl');
        $cliente = new nusoap_client('http://localhost/intranet/ws/ws/servidor.php?wsdl');	
	
	$parametros = array('nome'=>'Teste','idade'=>51);							
	$resultado = $cliente->call('exemplo', $parametros);	
	echo utf8_encode($resultado);
	
?>