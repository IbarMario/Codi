<?php
	include('lib/nusoap.php');
	$server = new soap_server;
	$server->configureWSDL('obtenerProducto', 'urn:obtenerProducto');
	$server->wsdl->addComplexType('producto','complexType','struct', 'all','',
	array(
	'id' => array('name' => 'id', 'type' => 'xsd:string'),
	'nombre' => array('name' => 'nombre', 'type' => 'xsd:string'),
	'direccion' => array('name' => 'direccion', 'type' => 'xsd:string' ),
	'correo' => array('name' => 'correo', 'type' => 'xsd:string' ),
	));
	
	$server->register('obtenerProducto',
	array('id' => 'xsd:int'),
	array('return'=>'tns:producto'),
	'urn:obtenerProducto',
	'urn:obtenerProducto#producto',
	'rpc',
	'encoded',
	'Este método devuelve un producto.');
	
	function obtenerProducto($id){
//	$con = new mysqli("localhost","user","pass","productos");
	$con = new mysqli("localhost","root","","tarea");
	$sql = " SELECT id, nombre, direccion, correo FROM empleados where id = $id ";
	$stmt = $con->prepare($sql);
	$stmt->execute();
	$stmt->bind_result($col1,$col2,$col3,$col4);
	$stmt->fetch();
	$row[0] = $col1;
	$row[1] = $col2;
	$row[2] = $col3;
	$row[3] = $col4;
	return array('id' => $row[0],'nombre' => $row[1],'direccion' => $row[2],'correo' => $row[3]);
	
	}
	// Use the request to (try to) invoke the service
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$server->service($HTTP_RAW_POST_DATA);
?> 