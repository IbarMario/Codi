<?php
	// http://www.thiengo.com.br
	// Por: Vinícius Thiengo
	// Em: 25/11/2013
	// Versão: 1.0
	// servidor.php
	include('nusoap/lib/nusoap.php');		
        include_once("../connection/database/connection.php");
        //include('db.php');
	$servidor = new nusoap_server();		
	$servidor->configureWSDL('urn:Servidor');
	$servidor->wsdl->schemaTargetNamespace = 'urn:Servidor';
        
	function actualiza($nom_variable, $nroregistro){
            $nroregistro1 = $nroregistro;
            $idusuario = 1;
            /*
            //$sql_insert = $conn->Execute("UPDATE t_aprobacion SET aprobacion_estado = '1', aprobacion_fecha_aprobacion = NOW(), aprobacion_usuario_id = '$idusuario' WHERE (aprobacion_nro_registro ='$nroregistro');");
            $sql = "UPDATE t_aprobacion SET aprobacion_estado = '1', aprobacion_fecha_aprobacion = NOW(), aprobacion_usuario_id = '$idusuario' WHERE (aprobacion_nro_registro ='$nroregistro1');";
            $sql = "SELECT * FROM t_aprobacion WHERE (aprobacion_nro_registro ='$nroregistro1');";
            echo $sql;
            print "HOLA";
            $db2->query($sql);*/
            
            if ($idusuario > 0) {
                $retorno = 1;
            } else {       
                $retorno = 0;
                    } 
            return($nom_variable.' -> '.$nroregistro.$retorno);
	}        
              
	$servidor->register('actualiza',
		array('variable'=>'xsd:string',	'codigo'=>'xsd:int'),
		array('retorno'=>'xsd:string'),
		'urn:Servidor.exemplo',
		'urn:Servidor.exemplo',
		'rpc',
		'encoded',
		'Apenas um exemplo utilizando o NuSOAP PHP.'
	);
	
        /*
        $servidor->register(
		'exemplo',
		array('nome'=>'xsd:string',
				'idade'=>'xsd:int'),
		array('retorno'=>'xsd:string'),
		'urn:Servidor.exemplo',
		'urn:Servidor.exmeplo',
		'rpc',
		'encoded',
		'Apenas um exemplo utilizando o NuSOAP PHP.'
	);*/
        
        
	$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA : '';
	$servidor->service($HTTP_RAW_POST_DATA);                     
        
?>