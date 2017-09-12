<?php session_start(); header("Expires: Mon, 26 Jul 19318 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");

include_once('../verifyLogin.php');

$hom = array();
//ocupados
$perh = OPERATOR::toSql(safeHTML(OPERATOR::getParam("perH")),'Text');
$hom[317] = preg_replace('/,/', '', $perh);

$a5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("A5")),'Text');
$hom[316] = preg_replace('/,/', '', $a5);

$hom[311] = $hom[317] - $hom[316];

$a2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("A2")),'Text');
$hom[313] = preg_replace('/,/', '', $a2);
$a3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("A3")),'Text');
$hom[314] = preg_replace('/,/', '', $a3);
$a4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("A4")),'Text');
$hom[315] = preg_replace('/,/', '', $a4);

$hom[312] = $hom[311] -  $hom[313] -  $hom[314]- $hom[315];
$a6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("A6")),'Text');
$hom[318] = preg_replace('/,/', '', $a6);
/*---------------*/
//mujeres
$muj = array();
//ocupados
$perh = OPERATOR::toSql(safeHTML(OPERATOR::getParam("perM")),'Text');
$muj[317] = preg_replace('/,/', '', $perh);

$b5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B5")),'Text');
$muj[316] = preg_replace('/,/', '', $b5);

$muj[311] = $muj[317] - $muj[316];

$b2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B2")),'Text');
$muj[313] = preg_replace('/,/', '', $b2);
$b3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B3")),'Text');
$muj[314] = preg_replace('/,/', '', $b3);
$b4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B4")),'Text');
$muj[315] = preg_replace('/,/', '', $b4);
$muj[312] = $muj[311] -  $muj[313] -  $muj[314]- $muj[315];
$b6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B6")),'Text');
$muj[318] = preg_replace('/,/', '', $b6);

/*
$b1 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B1")),'Text');
$muj[312] = preg_replace('/,/', '', $b1);

$b2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B2")),'Text');
$muj[313] = preg_replace('/,/', '', $b2);

$b3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B3")),'Text');
$muj[314] = preg_replace('/,/', '', $b3);

$b4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B4")),'Text');
$muj[315] = preg_replace('/,/', '', $b4);

//permanente
$muj[311] = $muj[312] + $muj[313] + $muj[314] + $muj[315];

//eventual
$b5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B5")),'Text');
$muj[316] = preg_replace('/,/', '', $b5);

//total mujeres
$muj[317] = $muj[316] + $muj[311];*/

//apoyo
$b6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B6")),'Text');
$muj[318] = preg_replace('/,/', '', $b6);

/*---------------*/
// salarios
$sala = array();
//ocupados
/*
$c1 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C1")),'Text');
$sala[312] = preg_replace('/,/', '', $c1);
$c2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C2")),'Text');
$sala[313] = preg_replace('/,/', '', $c2);
$c3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C3")),'Text');
$sala[314] = preg_replace('/,/', '', $c3);
$c4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C4")),'Text');
$sala[315] = preg_replace('/,/', '', $c4);
//permanente
$sala[311] = $sala[312] + $sala[313] + $sala[314] + $sala[315];
//eventual
$c5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C5")),'Text');
$sala[316] = preg_replace('/,/', '', $c5);
//total mujeres
$sala[317] = $sala[316] + $sala[311];*/
//total general
$hom[537] = $hom[317] + $hom[318];
$muj[537] = $muj[317] + $muj[318];
$sala[537] = $sala[317] + $sala[318];

/*---------------*/
// salarios
$sala = array();

$pers = OPERATOR::toSql(safeHTML(OPERATOR::getParam("perS")),'Text');
$sala[317] = preg_replace('/,/', '', $pers);

$c5 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C5")),'Text');
$sala[316] = preg_replace('/,/', '', $c5);

$sala[311] = $sala[317] - $sala[316];

$c2 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C2")),'Text');
$sala[313] = preg_replace('/,/', '', $c2);
$c3 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C3")),'Text');
$sala[314] = preg_replace('/,/', '', $c3);
$c4 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C4")),'Text');
$sala[315] = preg_replace('/,/', '', $c4);

$sala[312] = $sala[311] - $sala[313] - $sala[314]- $sala[315];

$c6 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C6")),'Text');
$sala[318] = preg_replace('/,/', '', $c6);



/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');    
if( !empty($regisroUID)  ) {

    // obtener el uid del token
    $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );

    $sql = "SELECT * FROM cap2_personalsueldos WHERE pesu_regi_uid = '".$regisroUID."' ";
    $db->query($sql);
    
    //echo $sql;
    while ( $aSueldo = $db->next_record() ) {   
        $sql  = "UPDATE cap2_personalsueldos SET ";        
        $sql .= "pesu_numero_hombres = '".$hom[$aSueldo["pesu_defi_uid"]]."', ";
        $sql .= "pesu_numero_mujeres = '".$muj[$aSueldo["pesu_defi_uid"]]."', ";
        $sql .= "pesu_sueldos_salarios = '".$sala[$aSueldo["pesu_defi_uid"]]."', ";
        $sql .= "pesu_suv_uid = '".$uid_token."', ";
        $sql .= "pesu_date_update = NOW(), ";
        $sql .= "pesu_estado = 1 ";
        $sql .= "WHERE pesu_regi_uid = '".$regisroUID."'  AND pesu_defi_uid = '".$aSueldo["pesu_defi_uid"]."' ";         
        $db2->query($sql);
    }

}

if( !empty( $btnsubmit ) ) {
    header("Location: acap2b.php");    
}
?>