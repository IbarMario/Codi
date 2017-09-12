<?php
ini_set('soap.wsdl_cache_enabled', '0'); 
require_once('../nusoap/lib/nusoap.php');

$oSoap = new soapclient('http://localhost/aprobacion/ws001.php?wdsl');

$err = $oSoap->getError();
if ($err)
{
	echo '<p><b>Error: ' . $err . '</b></p>';
}

$dato = $oSoap->call('HolaMundo',array('nombre' => 'Hollman'),'http://localhost/aprobacion/ws001');

if ($oSoap->fault)
{
	echo "Error al llamar el metodo<br/>".$oSoap->getError();
}
else 
{
	echo $dato;
}
?>

