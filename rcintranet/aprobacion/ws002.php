<?php

//web services para registrar aprobacion de boletas
include('../nusoap/lib/nusoap.php');

function HolaMundo ($nombre)
{
	return "Hola ".$nombre;
}

$server = new nusoap_server();
$ns="http://localhost/aprobacion/ws002";
$server->configurewsdl('ApplicationServices',$ns);
$server->wsdl->schematargetnamespace=$ns;
$server->register('HolaMundo',array('nombre' => 'xsd:string'),array('return' => 'xsd:string'),$ns);

$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA:'';


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