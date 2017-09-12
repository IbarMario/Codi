<?php
require '../nusoap/lib/nusoap/lib';
$server=new nusoap_server();
$server->configureWSDL("demo","urn:demo");
$server->register("price",
        array("name"->'xad:string'),
        array("return"->'xad:integer') //salidas        
        );
$HTTP_RAW_POST_DATA = isset($HTTP_RAW_POST_DATA) ? $HTTP_RAW_POST_DATA :'';
$server->service($HTTP_RAW_POST_DATA);

?>
