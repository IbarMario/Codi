<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
include_once('../verifyLogin.php');
//print_r($_POST);
/* usuario */
$usuario_uid = $_SESSION[SITE]["usr_uid"];
$regisroUID = $_SESSION[SITE]["registro_uid"];
$uidFormulario = $_SESSION[SITE]["uidtipoformulario"];

$btnsubmit = OPERATOR::toSql(safeHTML(OPERATOR::getParam("continuarregistro")),'Text');

// obtener el uid del token
$uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$usuario_uid."' ORDER BY suv_date DESC LIMIT 0,1 " );
    
if( !empty($regisroUID)  ) { 
    $sql = "SELECT * FROM frm2_bcap2_sistemagestion WHERE sige_regi_uid = '".$regisroUID."' ";
    $db->query($sql);
    //echo $sql;
    while ( $aGesAmb = $db->next_record() ) {         
        $sql  = "UPDATE frm2_bcap2_sistemagestion SET ";
        $sql .= "sige_valor = '".$_POST[$aGesAmb["sige_defi_uid"]]."', ";
        $sql .= "sige_description = UPPER('".$_POST[$aGesAmb["sige_defi_uid"]]."'), ";
        $sql .= "sige_suv_uid	 = '".$uid_token."', ";
        $sql .= "sige_updatedate = NOW(), ";
        $sql .= "sige_estado = 1 ";
        $sql .= "WHERE sige_regi_uid='".$regisroUID."' AND sige_defi_uid='".$aGesAmb["sige_defi_uid"]."' ";  
        $db2->query($sql);  
        //echo $sql;      
    }
}

    $reg = 0;
    $suma = 0;
    $pmax = "";
    for( $tabla = 1; $tabla <= 3; $tabla ++ ) {
    /*------------------------------------------------------------------------*/        
    $reg = $tabla;    
    $pmax = "a";
    switch( $tabla ){
        case 1: $reg = ""; $pmax = "a"; $capa_defi_uid = 288; break; // áreas tecnicas
        case 2: $pmax = "b"; $capa_defi_uid = 289; break; // gestion empresarial
        case 3: $pmax = "c"; $capa_defi_uid = 290; break; // capacidades personales
    }
//actualizar existentes
    $sql = "SELECT * FROM frm2_bcap2_productos WHERE prod_regi_uid ='".$regisroUID."' AND prod_position <> 0 ";          
    $db2->query($sql);
    $aPosition = array();
    
    if( $db2->numrows() >  0 ) {
        $pos = 0;        
        $i = 0;
        while( $aCert = $db2->next_record()  ) {
            
            $pos = $aCert["prod_position"];            
            $aPosition[$i] = $pos;
            
            // solo modificar aquellos que estan habilitados
            if( $aCert["prod_delete"] != 1 ) {
                $colA = OPERATOR::toSql(safeHTML(OPERATOR::getParam("A".$reg."_".$pos)),'Text');
                $colB = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B".$reg."_".$pos)),'Text');
                $colC = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C".$reg."_".$pos)),'Text');
                                                
                if( !empty($colA)  ) { 
                    $sql  = "UPDATE frm2_bcap2_productos SET ";                    
                    $sql .= "prod_product = UPPER('".$colA."'), "; 
                    $sql .= "prod_year  = '".$colB."', ";
                    $sql .= "prod_crt = UPPER('".$colC."'), ";                                                                                 
                    $sql .= "prod_suv_uid = '".$uid_token."', ";
                    $sql .= "prod_updatedate = NOW(), ";
                    $sql .= "prod_estado = 1 ";
                    $sql .= " WHERE prod_regi_uid='".$regisroUID."' AND  prod_position='".$pos."'";         
                    $db3->query($sql);
                }
        
            }
            $i = $i + 1;
        }
    }    
    //registrar nuevos
    $maxrow = OPERATOR::toSql(safeHTML(OPERATOR::getParam("maxrow_".$pmax)),'Number');        
    for( $pos = 1; $pos<=$maxrow; $pos++ ) {
        // si no existe registrar        
        if( !in_array($pos, $aPosition) ) {
            $colA = OPERATOR::toSql(safeHTML(OPERATOR::getParam("A".$reg."_".$pos)),'Text');
            $colB = OPERATOR::toSql(safeHTML(OPERATOR::getParam("B".$reg."_".$pos)),'Text');
            $colC = OPERATOR::toSql(safeHTML(OPERATOR::getParam("C".$reg."_".$pos)),'Text');
            if( !empty($colA)  ) {                                
                $sql  = "INSERT frm2_bcap2_productos SET ";
                $sql .= "prod_regi_uid = '".$regisroUID."', ";
                $sql .= "prod_position = '".$pos."', ";                
                $sql .= "prod_product= UPPER('".$colA."'), "; 
                $sql .= "prod_year  = '".$colB."', "; 
                $sql .= "prod_crt = UPPER('".$colC."'), ";                                     
                $sql .= "prod_suv_uid = '".$uid_token."', ";
                $sql .= "prod_createdate = NOW(), ";
                $sql .= "prod_updatedate = NOW(), ";
                $sql .= "prod_delete = 0 ";                         
                $db3->query($sql);                                                      
            }
        }
    }
}

if( !empty( $btnsubmit ) ) {
  header("Location: bcap3.php");
}
?>