<?php    
// incluyo nusoap 
require('lib/nusoap.php');
  
$l_oClient = new nusoap_client('http://localhost/nusoap/service1.php?wsdl', 'wsdl');
$l_oProxy  = $l_oClient->getProxy();
        
// llama al webmethod (obtenerProducto)
$parametro = isset($_GET['id'])?$_GET['id']:'';
$l_stResult = $l_oProxy->obtenerProductos($parametro);  

// print('<pre>');
// print_r($l_stResult); 
// print('</pre>');
 
$cadena = ''; 
$cadena .='<?xml version="1.0" encoding="utf-8"?><productos>
        <producto>';
foreach($l_stResult as $row){
$cadena .=' <codigo>'.$row['Codigo'].'</codigo>
            <nombre>'.$row['Nombre'].'</nombre>
            <descripcion>'.$row['Descripcion'].'</descripcion>
            <stock><![CDATA['.$row['Stock'].']]></stock>'; 
}   
$cadena .=' </producto>
            </productos>'; 
            
print($cadena);
 
 ?>