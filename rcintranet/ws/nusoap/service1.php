 <?php
include('lib/nusoap.php');
$server = new soap_server;
$server->configureWSDL('obtenerProductos', 'urn:obtenerProductos');          
$server->wsdl->addComplexType('RenglonProducto','complexType','struct','all','',
               array(
                        'id'         => array('name' => 'id', 'type' => 'xsd:string'),
                        'nombre'             => array('name' => 'nombre', 'type' => 'xsd:string'),
                        'direccion'         => array('name' => 'direccion', 'type' => 'xsd:string' ),
                        'correo'     => array('name' => 'correo', 'type' => 'xsd:string' ),
                        ));
$server->wsdl->addComplexType('ArrayOfRenglonProducto','complexType','array','','SOAP-ENC:Array',
array(),
array(        
            array('ref' => 'SOAP-ENC:arrayType',
                  'wsdl:arrayType' => 'tns:RenglonProducto[]'                              
                  )                                       
    ),
'tns:RenglonProducto');
$server->xml_encoding = "utf-8";
$server->soap_defencoding = "utf-8";
$server->register('obtenerProductos',
                  array('id' => 'xsd:int'),
                  array('id' => 'xsd:int'),
                  array('return'=>'tns:ArrayOfRenglonProducto'),
                  'urn:Servicio',
                  'urn:Servicio#obtenerProductos',
                  'rpc',
                  'literal',
                  'Este método devuelve la lista.');                            

function obtenerProductos($id){

$i=0;          
     $con = new mysqli("localhost","root","","tarea");
    $sql = " SELECT id, nombre, direccion, correo FROM empleados WHERE id = $id ";
    $stmt = $con->prepare($sql);
    $stmt->execute();
    $stmt->bind_result($col1,$col2,$col3,$col4);
    // $stmt->fetch();

    while ($stmt->fetch()) {
       // printf ("%s (%s)\n", $row[0], $row[1]);
        $row[0] = 'A';
        $row[1] = 'B';
        $row[2] = 'C';
        $row[3] = 'D';
        $rows[$i]=$row;
             // echo $rows[0];
        $i=$i+1;
    }

    return $rows; //array('Id_Producto' => $row[0],'Codigo' => $row[1],'Descripcion' => $row[2],'PrecioBaseVenta' => $row[3]);

}
// Use the request to (try to) invoke the service
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
$server->service($HTTP_RAW_POST_DATA);    
?> 