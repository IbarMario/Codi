<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
 
if( $_SESSION[SITE]["authenticated"] ) {    
    $_SESSION["menuactiveparent"]  = 'user';    
} else {
    header("Location: logout.php");
}

//$total = $_POST['total'];
//$input1 = $_POST['input-1'];
//$input2 = $_POST['input-2'];
//echo $total;
//echo $input1;
//echo $input2;
/*
$total = OPERATOR::toSql(safeHTML(OPERATOR::getParam("total")),'Text');
$total = preg_replace('/,/', '', $total);
echo ("tot".$total);
$compraextrajera = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-2")),'Text');
echo ("ext".$compraextranjera);
$compraextranjera = preg_replace('/,/', '', $compraextranjera);
echo ("ext".$compraextranjera);
$compranacional = $total - $compraextrajera;
echo ("nal".$compranacional);*/

$dat = array();
//$compranacional = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-1")),'Text');

$total = OPERATOR::toSql(safeHTML(OPERATOR::getParam("total")),'Text');
$total = preg_replace('/,/', '', $total);
//echo $total;

$dat[19] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-21")),'Number');
$dat[20] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-22")),'Number');
$dat[21] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-23")),'Number');
$dat[22] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-24")),'Number');

$compraextranjera = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-2")),'Text');
$compraextranjera = preg_replace('/,/', '', $compraextranjera);
//echo ("ext".$compraextranjera);
$dat[23] = preg_replace('/,/', '', $compraextranjera);
$dat[24] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-25")),'Number');
$dat[25] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-26")),'Number');
$dat[26] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-27")),'Number');
$dat[27] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-28")),'Number');

$dat[28] = $total;
$compranacional = $total - $compraextranjera;
//echo ("int".$compranacional);
$dat[18] = preg_replace('/,/', '', $compranacional);

$control=0;
$observ='Ninguna';
if ($total == 0){
    $control=1;
    $observ ="Módulo A Cap 6 Registro de Compra de Mercaderías para Reventa, Total de Mercaderías Compradas es igual a cero ";
};

/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );    
    if( !empty($regisroUID)  ) {
        $defi_uid = 1;               
        $sql = "SELECT * FROM frm1_cap6_comprareventa WHERE core_regi_uid = '".$regisroUID."' ORDER BY core_defi_uid ";
        $db->query($sql);
        
        //echo $sql;
        while ( $aMercaderia = $db->next_record() ) {            
            $sql  = "UPDATE frm1_cap6_comprareventa SET ";        
            $sql .= "core_valor = '".$dat[$aMercaderia["core_defi_uid"]]."', ";
            $sql .= "core_suv_uid = '".$uid_token."', ";
            $sql .= "core_updatedate = NOW(), ";
            $sql .= "core_estado = 1, ";
            $sql .= "core_control = '".$control."', ";
            $sql .= "core_observacion = '".$observ."' ";
            $sql .= "WHERE core_regi_uid = '".$regisroUID."' AND core_defi_uid = '".$aMercaderia["core_defi_uid"]."' ";  
            $db2->query($sql);
            
            //echo $sql."<br />";
        }                
    }  
if( !empty( $btnsubmit ) ) {
    header("Location: acap7.php");
}
?>