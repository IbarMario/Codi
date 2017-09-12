<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<?php 
if( $_SESSION[SITE]["authenticated"] ) {    
    $_SESSION["menuactiveparent"]  = 'user';    
} else {
    header("Location: logout.php");
}
?>

<?php

$iDeptoUid = OPERATOR::toSql(safeHTML(OPERATOR::getParam("uid")),'Number');
$sql = "SELECT * FROM  par_municipios  WHERE  muni_prov_uid = '".$iDeptoUid."' and  muni_swactive ='ACTIVE' and muni_delete <> 1";
$db->query( $sql );
//echo $sql;

$sSelect = "<select name=\"ai_municipio\" id=\"ai_municipio\" class=\"required\" ><option value=\"\">Seleccionar</option>";

while( $aMunicipios = $db->next_record() ) {
	$sSelect = $sSelect."<option value=\"".utf8_encode($aMunicipios["muni_uid"])."\">".$aMunicipios["muni_description"]."</option>";
}
$sSelect = $sSelect."</select>";
echo $sSelect;
?>
