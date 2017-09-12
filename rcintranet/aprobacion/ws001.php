<?php

//web services para registrar aprobacion de boletas
include('../nusoap/lib/nusoap.php');

function HolaMundo ($nombre)
{
	return "Hola ".$nombre;
}

$server = new soap_server();
$ns="http://localhost/aprobacion/ws001";
$server->configurewsdl('ApplicationServices',$ns);
$server->wsdl->schematargetnamespace=$ns;
$server->register('HolaMundo',array('nombre' => 'xsd:string'),array('return' => 'xsd:string'),$ns);

if (isset($HTTP_RAW_POST_DATA))
{
	$input = $HTTP_RAW_POST_DATA;
}
else
{
	$input = implode("\r\n", file('php://input'));
}
$server->service($input);
exit;
?>