<?php
	// http://www.thiengo.com.br
	// Por: Vinícius Thiengo
	// Em: 25/11/2013
	// Versão: 1.0
	// cliente.php
	include('../nusoap/lib/nusoap.php');		
	//$cliente = new nusoap_client('http://localhost/vinicius/thiengo/doc/projects/web-service-php-nusoap/servidor.php?wsdl');
        $cliente = new nusoap_client('http://localhost/intranet/ws/servidor1.php?wsdl');	
	
	//$parametros = array('nome'=>'Teste','idade'=>28880);							
        $parametros = array('variable'=>'Codigo','nroregistro'=>288801);							
        
	//$resultado = $cliente->call('exemplo', $parametros);	
        $resultado = $cliente->call('actualiza', $parametros);	
        echo "No pasa nada ";
	echo utf8_encode($resultado);
	
?>