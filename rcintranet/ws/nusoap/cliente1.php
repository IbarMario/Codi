 <?php    
// incluyo nusoap 
require('lib/nusoap.php');
  
$l_oClient = new nusoap_client('http://localhost/nusoap/service1.php?wsdl', 'wsdl');
$l_oProxy  = $l_oClient->getProxy();
        
// llama al webmethod (obtenerProducto)
$parametro = isset($_GET['id'])?$_GET['id']:'';
$l_stResult = $l_oProxy->obtenerProductos($parametro);
           
print('<pre>');
print_r($l_stResult); 
print('</pre>');
?> 

