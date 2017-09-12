<?php
$langDefault='es';

$basedatosbea = "bea";
$host = "localhost";
$user = "root";
$pass = "vpimge2015";

define("DATABASEBEA",	$basedatosbea);
define("DBHOST",	$host);
define("DBUSER",	$user);
define("DBPASSWORD",	$pass);

// **************** bd en postgres *************************************
$_SESSION["usr_site"]=1;

    //for localhost
    //$xpath = "/formularios";
    //$xpath = "/registrocomercio";
    $xpath = "/intranet";
    $urlLanguage=1;
    $urlPositionTitle	=	1;
    $urlPositionSubtitle=	2;
    $urlPositionSubtitle2=	3;
    $urlPositionSubtitle3=	4;
    $urlPositionSubtitle4=	5; 
    $urlPositionSubtitle5=	6;  

$domain = "http://" . $_SERVER['HTTP_HOST'] . $xpath;  //camino de la url activa del programa
$rootsystem = $_SERVER['DOCUMENT_ROOT'] . $xpath;      //camino de los documentos

define("SITE"  ,	'MCTA');
define("PATH_DOMAIN"  ,	$domain);
define("PATH_ROOT"    ,	$rootsystem);                           // PAGINA PRINCIPAL DEL SITIO
define("PATH_ADMIN"   ,	PATH_ROOT . "/OPERATOR"); 		// RUTA DEL ADMINISTRADOR
define("PATH_GALLERY" , PATH_ROOT . "/img/gallery");		// GALERIA DE IMAGENES

define("PATH_LOG"	, 	PATH_ROOT . "/docs");		// ARCHIVO DE ERRORES
define("DEBUG"		,	true);
define("SAVELOG"	,	false);

define("MULTIPLE_INSTANCES"	,	true);

$dbbea =new DBmysqlbea();
$dbbea2 =new DBmysqlbea();
$dbbea3 =new DBmysqlbea();
$dbbea4 =new DBmysqlbea();
$dbbea5 =new DBmysqlbea();
$dbbea6 =new DBmysqlbea();
$pagDbbea =new DBmysqlbea();

$msg="";
?>
