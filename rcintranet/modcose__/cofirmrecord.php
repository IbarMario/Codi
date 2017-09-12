<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');
//require_once('../lasgvhsbhsdflsbushdfuishadfuashdf.php');

/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
$incidencia = 0;
$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');
$chkconforme = OPERATOR::toSql(safeHTML(OPERATOR::getParam("chkconforme")),'Text');
$incidencia = OPERATOR::toSql(safeHTML(OPERATOR::getParam("rdbincidencia")),'Text');

$idtranscriptor = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ai_transcriptor")),'Text');
$codcontrol = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ai_codigo")),'Text');
$nroregistro = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ai_nro_registro")),'Text');

// obtener el uid del token
//$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );

if( $chkconforme == 'on' ) {   
    $codigo = OPERATOR::getDbValue("SELECT bole_codigo FROM par_boleta WHERE bole_regi_uid = '".$regisroUID."'");
    $matri = OPERATOR::getDbValue("SELECT inge_matriculadecomercio FROM cap1_informacion_general WHERE inge_regi_uid=".$regisroUID." and inge_delete<>1");

    $sql = "SELECT * FROM sys_registros WHERE regi_uid	 = '".$regisroUID."' AND  regi_swmodifica_uid = 1 ";
    $db->query($sql);
    
    $sql  = "UPDATE sys_registros SET ";
    $sql .= "regi_swmodifica_uid = '0', ";
    $sql .= "regi_legal_name = '".OPERATOR::toSql(safeHTML(OPERATOR::getParam("ai_nit")),'Text')."', ";      
    //$sql .= "regi_legal_ci = '".OPERATOR::toSql(safeHTML(OPERATOR::getParam("ai_ci")),'Text')."', ";        
    $sql .= "regi_updatedate = NOW(), ";
    $sql .= "regi_incidencia = '".$incidencia."', ";
    $sql .= "regi_transcripcion_id = '".$idtranscriptor."' ";
    $sql .= "WHERE regi_uid = '".$regisroUID."' AND regi_form_uid = '".$uidFormulario."' AND regi_user_uid = '".$usuario_uid."'  ";  
    $db2->query($sql); 
    // echo $sql;  
    $sql="";
    $_SESSION[SITE]["val_regi_swmodifica_uid"] = 0;
    $sql = "SELECT * FROM adm_gestion WHERE gest_uid NOT IN (SELECT regi_gest_uid FROM sys_registros WHERE regi_swmodifica_uid = '0' and regi_user_uid='".$_SESSION[SITE]["usr_uid"]."') and gest_sw_active='1'";
    $db -> query($sql);
    if ($db->numrows() > 0 && OPERATOR::getDbValue("SELECT count(*) FROM sys_registros WHERE regi_gest_uid=0 and regi_user_uid='".$_SESSION[SITE]["usr_uid"]."'")==0) {
        $sqli = "INSERT INTO sys_registros(regi_user_uid, regi_gest_uid, regi_form_uid, regi_swmodifica_uid, regi_createdate, regi_updatedate) VALUES ('".$_SESSION[SITE]["usr_uid"]."', 0, 1, '1', NOW(), NOW())";
        $db3->query($sqli);
    }
    
    $sqli="";
    $sqli = "UPDATE sys_users SET usr_sw_ref='1' WHERE usr_uid=".$_SESSION[SITE]["usr_uid"];
    $db -> query($sqli);
    
    //Confirma finalización del usuario
    
    $sqli="";
    $sqli = "UPDATE t_aprobacion SET aprobacion_estado = '1', aprobacion_fecha_aprobacion = NOW(), aprobacion_usuario_id = '$idtranscriptor', aprobacion_incidencia = '$incidencia' WHERE (aprobacion_codigo_control ='$codcontrol' and aprobacion_nro_registro ='$nroregistro');";
    //echo $sqli;
    $db -> query($sqli);
    
    //confirma finalización del usuario
    
    
    //web service de FUNDEMPRESA
    /*
    $resultado = ldjdujerhrjhgnvbdybyrg($matri,$codigo,'http://200.105.134.19:10080/wsInfoBoletas/servdata.asmx?WSDL');
    if ($resultado['RegistraBoletaResult']['regBoleta']['CtrResult']=="OK") {
        $sqle="UPDATE par_boleta SET bole_status=1 WHERE bole_regi_uid=".$regisroUID;
        $db4 -> query($sqle);
    }  else {
        // no se conecto al web service
        $sqle="UPDATE par_boleta SET bole_status=3 WHERE bole_regi_uid=".$regisroUID;
        $db4 -> query($sqle);        
    }  */
}
  
if( !empty( $btnsubmit ) ) {
    
    header("Location: bol.php");
}
?>