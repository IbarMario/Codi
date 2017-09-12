<?php
include_once("db.php"); 
include('lib/nusoap.php');
$server = new soap_server;
// $server->configureWSDL('obtenerProductos', 'urn:obtenerProductos');  
 
$ns     = "http://localhost/ws/mysql3/"; 
$server->configureWSDL("obtenerProductos",$ns);
$server->wsdl->schematargetnamespace=$ns;
 
 
$server->wsdl->addComplexType('RenglonProducto','complexType','struct','all','',
               array(
                        'Codigo'            => array('name' => 'codigo', 'type' => 'xsd:string'),
                        'Nombre'            => array('name' => 'nombre', 'type' => 'xsd:string'),
                        'Descripcion'       => array('name' => 'direccion', 'type' => 'xsd:string' ),
                        'Stock'             => array('name' => 'correo', 'type' => 'xsd:string' ),
                        ));
                        
$server->wsdl->addComplexType('ArrayOfRenglonProducto','complexType','array','','SOAP-ENC:Array',
                                array(),
                                array(        
                                            array('ref' => 'SOAP-ENC:arrayType',
                                                  'wsdl:arrayType' => 'tns:RenglonProducto[]'                              
                                                  )                                       
                                    ),
                                'tns:RenglonProducto');                        
 
function obtenerProductos($id=false){
 
$sql = "SELECT id, nombre, direccion, correo FROM empleados order by id";
$link = ConectarBase();
$rs = ConsultarBase($link,$sql);
$n=0; 
while ($row = mysql_fetch_array($rs)) {
 
    $html[$n]['id']          =$row[0];
    $html[$n]['nombre']          =$row[1];
    $html[$n]['direccion']     =$row[2];
    $html[$n]['correo']           =$row[3];
    $n++; 
    // $rows[] = $html; 
}
 
return $html;
 
}
 
$server->xml_encoding = "utf-8";
$server->soap_defencoding = "utf-8";
$server->register('obtenerProductos',
                  array('nombre' => 'xsd:int'),
                  array('return'=>'tns:ArrayOfRenglonProducto'),
                  $ns 
                  // 'urn:Servicio',
                  // 'urn:Servicio#obtenerProductos',
                  // 'rpc',
                  // 'literal',
                  // 'Este método devuelve la lista de  productos.'
                  );    
                  
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);    
?>