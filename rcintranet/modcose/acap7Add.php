<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT"); 
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');
$dat = array();
$total4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("total4")),'Text');
$total4 = preg_replace('/,/', '', $total4);
//echo "<br>Total total".$total4;
$totalventaexterno = OPERATOR::toSql(safeHTML(OPERATOR::getParam("total3")),'Text');
$totalventaexterno = preg_replace('/,/', '', $totalventaexterno);
//echo "<br>Tot VentasM.Externo".$totalventaexterno;
$total2 =  $total4 - $totalventaexterno;
//echo "<br>Tot VentasM.Nacional".$total2;
$ventanacional = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-1")),'Text'); // A
$ventanacional = preg_replace('/,/', '', $ventanacional);
//echo "<br>VentaInsPublica.".$ventanacional;
$dat[30] = preg_replace('/,/', '', $ventanacional); // Ventas a Instituciones P�blicas
$dat[31] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-21")),'Number'); // a
$dat[32] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-22")),'Number'); // b
$dat[33] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-23")),'Number'); // c
$dat[34] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-24")),'Number'); // d
$ventaextrajera = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-2")),'Text'); // B
$ventaextrajera = preg_replace('/,/', '', $ventaextrajera);
//echo "<br>Venta emp.priv.".$ventaextrajera;
$dat[35] = preg_replace('/,/', '', $ventaextrajera); // Ventas a Empresas Privadas
$dat[36] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-25")),'Number');
$dat[37] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-26")),'Number');
$dat[38] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-27")),'Number');
$dat[39] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-28")),'Number');
//$ventapersonaparticular = OPERATOR::toSql(safeHTML(OPERATOR::getParam("input-3")),'Text'); // C
//$ventapersonaparticular = preg_replace('/,/', '', $ventapersonaparticular);
$ventapersonaparticular = $total2 - $ventanacional - $ventaextrajera;
//echo "<br>ventaparti".$ventapersonaparticular;
$dat[40] = preg_replace('/,/', '', $ventapersonaparticular); // Ventas a Empresas Privadas
$totalventaexterno = OPERATOR::toSql(safeHTML(OPERATOR::getParam("total3")),'Text');
$totalventaexterno = preg_replace('/,/', '', $totalventaexterno);
//echo "<br>Tot VentasM.Externo".$totalventaexterno;
$dat[41] = preg_replace('/,/', '', $totalventaexterno); // Total Ventas al Mercado Externo 
$dat[42] = ( $dat[30] + $dat[35] + $dat[40] ) + $dat[41] ; //TOTAL VENTAS
$dat[29] = ( $dat[30] + $dat[35] + $dat[40] ) ; //Total Ventas al Mercado Nacional
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$control=0;
$observ='Ninguna';
if ($total4 == 0){
    $control=1;
    $observ ="Módulo A Cap 7 Venta de Mercadería o Servicios, Total Ventas es igual a cero ";
};

$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
if( !empty($regisroUID)  ) {      
    $sql = "SELECT * FROM frm1_cap7_ventaservicios WHERE vese_regi_uid = '".$regisroUID."' ";
    $db->query($sql);
    //echo $sql;
    while ( $aMercaderia = $db->next_record() ) {            
        $sql  = "UPDATE frm1_cap7_ventaservicios SET ";        
        $sql .= "vese_valor = '".$dat[$aMercaderia["vese_defi_uid"]]."', ";
        $sql .= "vese_suv_uid = '".$uid_token."', ";
        $sql .= "vese_updatedate = NOW(), ";
        $sql .= "vese_estado = 1, ";
        $sql .= "vese_control = '".$control."', ";
        $sql .= "vese_observacion = '".$observ."' ";
        $sql .= "WHERE vese_regi_uid = '".$regisroUID."' AND vese_defi_uid = '".$aMercaderia["vese_defi_uid"]."' ";  
        $db2->query($sql);
        //echo $sql."<br />";
    }    
    
    // actualizar meses    
    $litmes = "";
    for ( $j=1; $j<=12; $j++ ) {
        $mes = OPERATOR::toSql(safeHTML(OPERATOR::getParam("mes_".$j."")),'Text');
        if( $mes == 'on' ) {
            $litmes = $litmes.'1';
        } else {
            $litmes = $litmes.'0';
        }
    }    
    $sql  = "UPDATE frm1_cap7_2mesesmayorventa SET ";        
    $sql .= "memv_meses = '".$litmes."', ";
    $sql .= "memv_suv_uid = '".$uid_token."' ";
    $sql .= "WHERE memv_regi_uid = '".$regisroUID."' ";  
    $db2->query($sql);                
    //echo $sql;
}
  
if( !empty( $btnsubmit ) ) {
    header("Location: acap8.php");
}
?>