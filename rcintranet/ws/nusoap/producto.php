<?php
require('lib/nusoap.php');

$l_oClient = new soapclient('http://localhost/nusoap/service.php?wsdl','wsdl');
$l_oProxy = $l_oClient->getProxy();

$parametro = $_GET['id'];
$l_stResult = $l_oProxy->obtenerProducto($parametro);


print '<h1>Resultado :</h1>'
. '<br>Id : ' . $l_stResult['id']
. '<br>Nombre : ' . $l_stResult['nombre']
. '<br>Direccion ' . $l_stResult['direccion']
. '<br>Correo ' . $l_stResult['correo'];

?>