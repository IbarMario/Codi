<?php session_start(); 
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");

if( $_SESSION[SITE]["authenticated"] ) {    
    $_SESSION["menuactiveparent"]  = 'user';    
} else {
    header("Location: logout.php");
}

//se recupera la segunda fila personal eventual
$peventualH= OPERATOR::toSql(safeHTML(OPERATOR::getParam("peventualH")),'Text');
$peventualH = preg_replace('/,/', '', $peventualH);
$peventualM = OPERATOR::toSql(safeHTML(OPERATOR::getParam("peventualM")),'Text');
$peventualM = preg_replace('/,/', '', $peventualM);
$peventual = OPERATOR::toSql(safeHTML(OPERATOR::getParam("peventual")),'Text');
$peventual = preg_replace('/,/', '', $peventual);
//se recupera la tercera fila TOTAL
$totperH = OPERATOR::toSql(safeHTML(OPERATOR::getParam("totperH")),'Text');
$totperM = OPERATOR::toSql(safeHTML(OPERATOR::getParam("totperM")),'Text');
$totperHM = OPERATOR::toSql(safeHTML(OPERATOR::getParam("totperHM")),'Text');

$totperH = preg_replace('/,/', '', $totperH);
$totperM = preg_replace('/,/', '', $totperM);
$totperHM = preg_replace('/,/', '', $totperHM);

//echo $totperH;
//echo $totperM;
//echo $totperHM;
$control=0;
$observ='Ninguna';
if ($totperH == 0 && $totperM == 0 && $totperHM == 0){
    $control=1;
    $observ ="Módulo A Cap 2 Registro de Personal Hombres, Personal Mujeres y Sueldos y Salarios igual a cero";
} else {
    if ($totperH == 0){
        $control=1;
        $observ ="Módulo A Cap 2 Registro de Personal Hombres igual a cero";
    } else {
        if ($totperM == 0){
            $control=1;
            $observ ="Módulo A Cap 2 Registro de Personal Mujeres igual a cero";
        }           
    }    
};

//echo $control;
//echo $observ;

//echo $totperH;
//echo $totperM;
//echo $totperHM;
//echo "<br>";
//echo $peventualH;
//echo $peventualM;
//echo $peventual;
//echo "<br>";

$pepermanenteH = $totperH - $peventualH;
$pepermanenteM = $totperM - $peventualM; 
$pepermanente =  $totperHM - $peventual;

//echo $pepermanenteH;
//echo $pepermanenteM;
//echo $pepermanente;
//se recupera la primera fila personal permanente
//$pepermanenteH = OPERATOR::toSql(safeHTML(OPERATOR::getParam("pepermanenteH")),'Text');
//$pepermanenteH = preg_replace('/,/', '', $pepermanenteH);
//$pepermanenteM= OPERATOR::toSql(safeHTML(OPERATOR::getParam("pepermanenteM")),'Text');
//$pepermanenteM = preg_replace('/,/', '', $pepermanenteM);
//$pepermanente = OPERATOR::toSql(safeHTML(OPERATOR::getParam("pepermanente")),'Text');
//$pepermanente = preg_replace('/,/', '', $pepermanente);

//se recupera la cuarta personal de apoyo
$nopagH = OPERATOR::toSql(safeHTML(OPERATOR::getParam("nopagH")),'Text');
$nopagH = preg_replace('/,/', '', $nopagH);
$nopagM = OPERATOR::toSql(safeHTML(OPERATOR::getParam("nopagM")),'Text');
$nopagM = preg_replace('/,/', '', $nopagM);
/* totgen 
$totgenH = OPERATOR::toSql(safeHTML(OPERATOR::getParam("totgenH")),'Number');
$totgenM = OPERATOR::toSql(safeHTML(OPERATOR::getParam("totgenM")),'Number');
$totgenHM = OPERATOR::toSql(safeHTML(OPERATOR::getParam("totgenHM")),'Number');   */
$totgenH = $pepermanenteH + $peventualH + $nopagH;
$totgenM = $pepermanenteM + $peventualM + $nopagM;
$totgenHM = $pepermanente + $peventual;

$salminal = OPERATOR::toSql(safeHTML(OPERATOR::getParam("salminal")),'Text');
//echo $salminal;
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');
// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );    
if( !empty($regisroUID)  ) {
        $defi_uid = 1;
        // Personal permanente
        $sql  = "UPDATE cap2_personalsueldos SET ";        
        $sql .= "pesu_numero_hombres = '".$pepermanenteH."', ";
        $sql .= "pesu_numero_mujeres = '".$pepermanenteM."', ";
        $sql .= "pesu_sueldos_salarios = '".$pepermanente."', ";
        $sql .= "pesu_suv_uid = '".$uid_token."', ";
        $sql .= "pesu_date_update = NOW(), ";
        $sql .= "pesu_estado = 1, ";
        $sql .= "pesu_control = '".$control."', ";
        $sql .= "pesu_observacion = '".$observ."' ";
        $sql .= "WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid = '".$defi_uid."' ";         
        //echo $sql."<br>";
        $db->query($sql);
        
        //echo $sql;        
        $defi_uid = 2;
        // Personal eventual
        $sql  = "UPDATE cap2_personalsueldos SET ";       
        $sql .= "pesu_numero_hombres = '".$peventualH."', ";
        $sql .= "pesu_numero_mujeres = '".$peventualM."', ";
        $sql .= "pesu_sueldos_salarios = '".$peventual."', ";
        $sql .= "pesu_suv_uid = '".$uid_token."', ";
        $sql .= "pesu_date_update = NOW(), ";
        $sql .= "pesu_estado = 1, ";
        $sql .= "pesu_control = '".$control."', ";
        $sql .= "pesu_observacion = '".$observ."' ";
        $sql .= "WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid  = '".$defi_uid."' ";         
        //echo $sql."<br>";
        $db->query($sql);  
        
        $defi_uid = 3;
        // Personal subtot personal
        $sql  = "UPDATE cap2_personalsueldos SET ";        
        $sql .= "pesu_numero_hombres = '".$totperH."', ";
        $sql .= "pesu_numero_mujeres = '".$totperM."', ";
        $sql .= "pesu_sueldos_salarios = '".$totperHM."', ";
        $sql .= "pesu_suv_uid = '".$uid_token."', ";
        $sql .= "pesu_date_update = NOW(), ";
        $sql .= "pesu_estado = 1, ";
        $sql .= "pesu_control = '".$control."', ";
        $sql .= "pesu_observacion = '".$observ."' ";
        $sql .= "WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid  = '".$defi_uid."' ";        
        //echo $sql."<br>";
        $db->query($sql); 
                
        $defi_uid = 4;
        // Personal nopagados
        $sql  = "UPDATE cap2_personalsueldos SET ";       
        $sql .= "pesu_numero_hombres = '".$nopagH."', ";
        $sql .= "pesu_numero_mujeres = '".$nopagM."', ";
        $sql .= "pesu_sueldos_salarios = '0', ";
        $sql .= "pesu_suv_uid = '".$uid_token."', ";
        $sql .= "pesu_date_update = NOW(), ";
        $sql .= "pesu_estado = 1, ";
        $sql .= "pesu_control = '".$control."', ";
        $sql .= "pesu_observacion = '".$observ."' ";
        $sql .= "WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid  = '".$defi_uid."' ";        
        //echo $sql."<br>";
        $db->query($sql); 
        
        $defi_uid = 5;
        // Personal tot general
        $sql  = "UPDATE cap2_personalsueldos SET ";
        $sql .= "pesu_numero_hombres = '".$totgenH."', ";
        $sql .= "pesu_numero_mujeres = '".$totgenM."', ";
        $sql .= "pesu_sueldos_salarios = '".$totgenHM."', ";
        $sql .= "pesu_suv_uid = '".$uid_token."', ";
        $sql .= "pesu_date_update = NOW(), ";
        $sql .= "pesu_estado = 1, ";
        $sql .= "pesu_control = '".$control."', ";
        $sql .= "pesu_observacion = '".$observ."' ";
        $sql .= "WHERE pesu_regi_uid = '".$regisroUID."' AND pesu_defi_uid  = '".$defi_uid."' ";        
        //echo $sql."<br>";
        $db->query($sql);
}
  
if( !empty( $btnsubmit ) ) {
    header("Location: acap3.php");
}
?>