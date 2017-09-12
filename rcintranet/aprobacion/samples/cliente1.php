<?php
require 'lib/nusoap.php';
$cliente=new nusoap_client("http://localhost/intranet/aprobacion/server1.php?wsdl");

$codigo=0;

$cursos=$cliente->call('listarCursos', array('codigo'->'$codigo'));
    

echo $cursos;
    
}


?>