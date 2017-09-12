<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");

if( $_SESSION[SITE]["authenticated"] ) {
    $_SESSION["menuactiveparent"]  = 'user';    
} else {
    header("Location: logout.php");
}

// valor de la tarifa
$input1 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-1")),'Text');
$input1 = preg_replace('/,/', '', $input1);

$input2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-2")),'Text');
$input2 = preg_replace('/,/', '', $input2);

$input3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-3")),'Text');
$input3 = preg_replace('/,/', '', $input3);

$input4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-4")),'Text');
$input4 = preg_replace('/,/', '', $input4);

$input5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-5")),'Text');
$input5 = preg_replace('/,/', '', $input5);

$input6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-6")),'Text');
$input6 = preg_replace('/,/', '', $input6);

$input7 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-7")),'Text');
$input7 = preg_replace('/,/', '', $input7);

$ai_totsuministros = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ai_totsuministros")),'Text');
$ai_totsuministros = preg_replace('/,/', '', $ai_totsuministros);

//echo "total-> ".$ai_totsuministros;

$otroscombustibles = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-8")),'Text');

/*
$input8 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-8")),'Text');
$input8 = preg_replace('/,/', '', $input8);*/


// tarifa
$catElectricidad = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-11")),'Text');
if( $catElectricidad == 'OTRAS') {
    $otro = OPERATOR::toSql(safeHTML(OPERATOR::getParam("otroelectricidad")),'Text');
    if( !empty( $otro ) ) {
        $catElectricidad = $otro;
    }
}

$catAgua = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-12")),'Text');
if( $catAgua == 'OTRAS') {
    $otro = OPERATOR::toSql(safeHTML(OPERATOR::getParam("otroagua")),'Text');
    if( !empty( $otro ) ) {
        $catAgua = $otro;
    }
}

$catGas = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-13")),'Text');
if( $catGas == 'OTRAS') {
    $otro = OPERATOR::toSql(safeHTML(OPERATOR::getParam("otrogas")),'Text');
    if( !empty( $otro ) ) {
        $catGas = $otro;
    }
}

/* tot se recupera todos los valores que se sumarán el total de la pantallla se queda y no se toma en cuenta */
$sumatotal = $input1 + $input2 + $input3 + $input4 + $input5 + $input6 + $input7;
//echo $sumatotal;
if ($sumatotal == 0) {
    $total = $ai_totsuministros;
} else {
    $total = $sumatotal;
}
//echo $total;
$control=0;
$observ='Ninguna';
if ($total == 0){
    $control=1;
    $observ ="Módulo A Cap 3 Registro de Suministros, El Total es igual a cero";
} else {
    if ($input1 == 0){
        $control=1;
        $observ ="Módulo A Cap 3 Registro de Suministros, Energía eléctrica = cero";
    }   
};

/*
$inputotros = OPERATOR::toSql(safeHTML(OPERATOR::getParam("otros_gastos")),'Text'); //fila 1
$inputotros = preg_replace('/,/', '', $inputotros);*/
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
    if( !empty($regisroUID)  ) {
        $defi_uid = 6;        
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input1."', ";
        $sql .= "sumi_categoriatarifaria = UPPER('".$catElectricidad."'), ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion = '".$observ."' ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);
        
        $defi_uid = 7;                
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input2."', ";
        $sql .= "sumi_categoriatarifaria = UPPER('".$catAgua."'), ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion = '".$observ."' ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);
        
        $defi_uid = 8;        
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input3."', ";
        $sql .= "sumi_categoriatarifaria = UPPER('".$catGas."'), ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion = '".$observ."' ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);
        
        $defi_uid = 9;        
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input4."', ";
        $sql .= "sumi_categoriatarifaria = '', ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion = '".$observ."' ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);
        
        $defi_uid = 10;        
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input5."', ";
        $sql .= "sumi_categoriatarifaria = '', ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion =  UPPER('".$observ."') ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);
        
        $defi_uid = 11;        
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input6."', ";
        $sql .= "sumi_categoriatarifaria = '', ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion =  UPPER('".$observ."') ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);
        
        // Otros combustibles
        $defi_uid = 12;        
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input7."', ";
        $sql .= "sumi_categoriatarifaria = UPPER('".$otroscombustibles."'), ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion =  UPPER('".$observ."') ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);        

/*
        // gnv
        $defi_uid = 681;    
        $sql  = "UPDATE cap3_suministros SET ";        
        $sql .= "sumi_valor = '".$input6."', ";
        $sql .= "sumi_categoriatarifaria = '', ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW() ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid =681 ";       
        $db->query($sql);      */

        // Total
        $defi_uid = 13;
        $sql  = "UPDATE cap3_suministros SET ";
        $sql .= "sumi_valor = '".$total."', ";
        $sql .= "sumi_categoriatarifaria = '', ";
        $sql .= "sumi_suv_uid = '".$uid_token."', ";
        $sql .= "sumi_createupdate = NOW(), ";
        $sql .= "sumi_estado = 1, ";
        $sql .= "sumi_control = '".$control."', ";
        $sql .= "sumi_observacion = UPPER('".$observ."') ";
        $sql .= "WHERE sumi_regi_uid = '".$regisroUID."' AND sumi_defi_uid = '".$defi_uid."' ";         
        
        //echo $sql;
        $db->query($sql);
/*
        $defi_uid = 17;        
        $sql  = "UPDATE frm1_cap5_otrosgastosoperativos SET ";        
        $sql .= "otga_valor  = '".$inputotros."', ";
        $sql .= "otga_updatedate = NOW() ";
        $sql .= "WHERE otga_regi_uid     = '".$regisroUID."' AND otga_defi_uid = '".$defi_uid."' ";         
        $db->query($sql);      */
    
    }
if( !empty( $btnsubmit ) ) {
    header("Location: acap4.php");
}
?>