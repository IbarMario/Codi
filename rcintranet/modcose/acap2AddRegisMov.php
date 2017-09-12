<?php 
session_start(); 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");

if( $_SESSION[SITE]["authenticated"] ) {    
    $_SESSION["menuactiveparent"]  = 'user';    
} else {
    header("Location: logout.php");
}

/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$regi = OPERATOR::toSql(safeHTML(OPERATOR::getParam("chkconforme")),'Text');
$sql = "UPDATE sys_registros SET regi_movco='".$regi."' WHERE regi_uid='".$regisroUID."'";
$db -> query($sql);



$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

if( $regi=="YES" ) {
    header("Location: acap2.php");
}else{
    header("Location: bol1.php");
}
