<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');
$dat = array();
$desc = array();

$dat[59] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("rbtn_inversion")),'Text'); //gastos o inversi�n

$dat[60] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("chk_1")),'Text');
$dat[61] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("chk_2")),'Text');
$dat[62] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("chk_3")),'Text'); //otros
// descripcion
$desc[62] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("inversionotros")),'Text');

if( $dat[59] == 1 ) {
    $dat[60] = 0;
    $dat[61] = 0;
    $dat[62] = 0;
    $desc[62] = "";
}

if( !empty( $dat[60] ) ) { $dat[60] = 1; }
if( !empty( $dat[61] ) ) { $dat[61] = 1; }
if( !empty( $dat[62] ) ) { $dat[62] = 1; }

$dat[63] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("rbtn_agua")),'Text');
$dat[64] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("rbtn_certi")),'Text'); //certificaciones
$dat[65] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("rbtn_ars")),'Text');   //residuos solidos
$dat[66] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("rbtn_cap")),'Text');  // capacitacion
$dat[67] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("rbtn_aga")),'Text');  // otras acciones de gesti�n ambiental

// descripcion
$desc[64] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("certiambiental")),'Text');
$desc[67] = OPERATOR::toSql(safeHTML(OPERATOR::getParam("otrasambiental")),'Text');


if( $dat[64] == 0 ) {
    $desc[64] = "";
}

if( $dat[67] == 0 ) {
    $desc[67] = "";
}

/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];


$control=0;
$observ='Ninguna';

$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );

if( !empty($regisroUID)  ) {   

    $sql = "SELECT * FROM frm1_bcap1_gestionambiental WHERE geam_regi_uid = '".$regisroUID."' ";
    $db->query($sql);

    //echo $sql;
    while ( $aGesAmb = $db->next_record() ) {         
        $sql  = "UPDATE frm1_bcap1_gestionambiental SET ";
        $sql .= "geam_valor = '".$dat[$aGesAmb["geam_defi_uid"]]."', ";
        $sql .= "geam_description = UPPER('".$desc[$aGesAmb["geam_defi_uid"]]."'), ";
        $sql .= "geam_suv_uid	 = '".$uid_token."', ";
        $sql .= "geam_updatedate = NOW(), ";        
        $sql .= "geam_estado = 1, ";
        $sql .= "geam_control = '".$control."', ";
        $sql .= "geam_observacion = '".$observ."' ";
        $sql .= "WHERE geam_regi_uid = '".$regisroUID."' AND geam_defi_uid	 = '".$aGesAmb["geam_defi_uid"]."' ";  
        $db2->query($sql);
        //echo $sql."<br />";
    }      
    //echo $sql."<br />"; 
      //actualizar existentes
    $sql = "SELECT * FROM frm1_bcap1_certificados WHERE cert_regi_uid = '".$regisroUID."' ";  
    
    // echo $sql."<br />";
    $db2->query($sql);
    $aPosition = array();
    
    if( $db2->numrows() >  0 ) {
        $pos = 0;        
        $i = 0;
        while( $aCert = $db2->next_record()  ) {
            
            $pos = $aCert["cert_position"];            
            $aPosition[$i] = $pos;
            
            // solo modificar aquellos que estan habilitados
            if( $aCert["cert_delete"] != 1 ) {
                $certA = OPERATOR::toSql(safeHTML(OPERATOR::getParam("otrasambiental_".$pos)),'Text');
                $sql3 = " UPDATE frm1_bcap1_certificados SET cert_descrip = UPPER('".$certA."') "
                ." WHERE cert_regi_uid = '".$regisroUID."' AND  cert_position = '".$pos."' ";                        

                $db3->query($sql3);
            }
            $i = $i + 1;
        }
    }
    
    if($dat[67]) {

    //registrar nuevos
        $maxrow = OPERATOR::toSql(safeHTML(OPERATOR::getParam("maxrow")),'Number');
        for( $j = 1; $j<=$maxrow; $j++ ) {
        // si no existe registrar
            if( ! in_array($j, $aPosition) ) {
                
                $certA = OPERATOR::toSql(safeHTML(OPERATOR::getParam("otrasambiental_".$j."")),'Text');

                
                if( !empty($certA) ) {
                    $sql3 = " INSERT INTO frm1_bcap1_certificados( cert_regi_uid, cert_descrip, cert_position, cert_delete ) "
                    ." VALUES ( '".$regisroUID."', UPPER('".$certA."'), '".$j."', 0 ) ";
                    $db3->query($sql3);
                }
            }
        }
    }    





    $sql = "SELECT * FROM frm1_bcap1_certificadosambientales WHERE ceam_regi_uid = '".$regisroUID."' and ceam_delete <>1 ";  
    

    $db2->query($sql);
    $aPosition = array();
    
    if( $db2->numrows() >  0 ) {
        $pos = 0;        
        $i = 0;
        while( $aCert = $db2->next_record()  ) {
            
            $pos = $aCert["ceam_position"];            
            $aPosition[$i] = $pos;
            
            // solo modificar aquellos que estan habilitados
            if( $aCert["ceam_delete"] == 0 ) {
                $certA = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ceram_".$pos)),'Text');
                $sql3 = " UPDATE frm1_bcap1_certificadosambientales SET ceam_description = UPPER('".$certA."') "
                ." WHERE ceam_regi_uid = '".$regisroUID."' AND  ceam_position = '".$pos."' ";    
                
                $db3->query($sql3);

            }
            $i = $i + 1;
        }
    }
    
    //registrar nuevos
    if($dat[64]) {
        $maxrow = OPERATOR::toSql(safeHTML(OPERATOR::getParam("maxrow2")),'Number');
        for( $j = 1; $j<=$maxrow; $j++ ) {
        // si no existe registrar
            if( ! in_array($j, $aPosition) ) {
                
                $certA = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ceram_".$j."")),'Text');

                
                if( !empty($certA) ) {
                    $sql3 = " INSERT INTO frm1_bcap1_certificadosambientales ( ceam_regi_uid, ceam_description, ceam_position, ceam_delete ) "
                    ." VALUES ( '".$regisroUID."', UPPER('".$certA."'), '".$j."', 0 ) ";
                    $db3->query($sql3);
                    

                }
            }
        }

    }




}

if( !empty( $btnsubmit ) ) {
    header("Location: bcap2.php");
}
?>