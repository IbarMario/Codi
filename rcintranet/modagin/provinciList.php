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
$sql = "SELECT * FROM par_provincias WHERE prov_dept_uid= '".$iDeptoUid."' and prov_delete<>1 and prov_swactive='ACTIVE' ";
$db->query( $sql );
// echo $sql;

$sSelect = "<select name=\"ai_provin\" id=\"ai_provin\" class=\"required\" onchange=\"showMunicipios();\" ><option value=\"\">Seleccionar</option>";

while( $aMunicipios = $db->next_record() ) {
	$sSelect = $sSelect."<option value=\"".utf8_encode($aMunicipios["prov_uid"])."\">".$aMunicipios["prov_description"]."</option>";
}
$sSelect = $sSelect."</select>";
echo $sSelect;
?>