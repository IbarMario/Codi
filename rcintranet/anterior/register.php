<?php
//----modificado en gran parte para recibir informacion del email
//----por wilfredo mendoza ------ 
//
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("connection/database/connection.php");
include_once("connection/core/operator.php");
//require_once('jasgvhsbhsdflsbushdfuishadfuashdf.php');
//require_once('kasgvhsbhsdflsbushdfuishadfuashdf.php');
$codigoactivacion = OPERATOR::toSql(safeHTML(OPERATOR::getParam("act")),'Text');
echo "codigo de Activación ".$codigoactivacion;
$sql = "SELECT * FROM sys_users LEFT JOIN ( SELECT usr_uid, md5( CONCAT( usr_uid, '-', usr_login, '-', usr_email, '-tok' ) ) AS tok FROM sys_users WHERE usr_status = 'INACTIVE' AND usr_delete =0  ) AS token
		ON ( sys_users.usr_uid = token.usr_uid ) WHERE sys_users.usr_status = 'INACTIVE' AND sys_users.usr_delete = 0 AND token.tok = '".$codigoactivacion."' "; 
//sql para verificar que no esta activado el ultimo registro de empresario realizado
//echo $sql;
$db->query( $sql );
$frmseccionciiu='';
$nroformulario=0;
$activate = 2;               // codigo que se desconoce
$stat = 1;
//echo "numero de filas";
//echo $db->numrows();
if( $db->numrows() > 0 ) {
    //se tiene numrows > 0 cuando el estado del registro es INACTIVO    
    $aUser = $db->next_record();
    //echo 'useruid'.$aUser["usr_uid"];
    //echo 'userlogin'.$aUser["usr_login"];
    //echo 'useremail'.$aUser["usr_email"];
    
    $sql = "UPDATE sys_users SET usr_status = 'ACTIVE' WHERE usr_uid = ".$aUser["usr_uid"]." ";
    $sql = "UPDATE sys_users SET usr_status = 'ACTIVE', usr_dateupdate = NOW() WHERE usr_uid = ".$aUser["usr_uid"]." ";
    //se actualiza el estado en el registro sys_users nuevo a ACTIVO
    //echo 'Actualizado a ACTIVO-> '.$sql."<br>";
    $db2->query( $sql );
    $cadenauno=$aUser["usr_login"];     //
    //$resultado = hdjdujerhrjhgnvbdybyrg($cadenauno,'http://200.105.134.19:10080/wsInfoBoletas/servdata.asmx?WSDL');   //WEB Service para trear datos de la empresa
    //$link = mysqli_connect("localhost", "root", "vpimge2015", "bea");
    //$link = mysqli_connect("192.168.20.38", "user_encuesta", "pass_encuesta", "bea");
    //echo "conectado a la base de datos empresarial";
    $query = "SELECT * FROM padron_empresarial WHERE matricula = '".$cadenauno."' LIMIT 0,1 ";  // se pide todos los datos de la base del BEA    
    //echo $query;
    $db3->query( $query );
    if( $db3->numrows() > 0 ) {
        $row = $db3->next_record();
                //echo "sacar todos los campos necesarios de la base de datos empresarial";
                $razonsocial = $row['razon_social'];    //se tiene en la BEA2014
                $actividad = $row['actividad'];         //se tiene en la BEA2014
                $typoencuesta = $row['seccion_ciiu'];   //verificar el tipo de formularios a llenar POR MEJORAR EN LA BEA2014.
                $typeencuesta = $row['nro_formulario'];               
                $sqlupd="update sys_users set usr_form_uid=".$typeencuesta." where usr_uid=".$aUser["usr_uid"];
                //echo "actualiza el tipo de encuesta";
                $db2->query( $sqlupd );                
                // desde aqui se copia
        /*
        $typeencuesta=$row['seccion'];
        $razonsoc=$row['RazonSocial'];
        $tiposocie=$row['TipoSocietario'];
        $frmnit=$row['Nit'];
        $frmmatricula=$row['IdMatricula'];
        $frmdepto=$row['Departamento'];
        $frmmunicipio=$row['Municipio'];
        $formzona=$row['Zona'];
        $frmcalle=$row['Calle'];
        $frmtelefono=$row['Fono'];
        $frmfax=$row['Fax'];
        $frmmail=$row['Mail'];
        $frmciiu=$row['ClaseCiiu'];
         */
        $frmmatricula=$row['matricula'];                //        
        $frmnit=$row['nit'];                            //        
        $razonsoc=$row['razon_social'];                 //
        $tiposocie=$row['tipo_societario'];             //$societarioxtype
        $frmdepto=$row['departamento'];                 //frmxdepto        
        $frmprovincia=$row['provincia'];
        $frmmunicipio=$row['municipio'];                //frmxmuni        
        $frmciudad = $row['ciudad'];                    //se tiene en la BEA2014
        $frmzona=$row['zona'];                          //no existe en la base 
        $frmcalle=$row['direccion'];            
        $frmnumero=$row['numero'];            
        $frmreferencia=$row['referencia_calles'];
        $frmtelefono=$row['telefono'];                  //
        $frmcelular=$row['celular'];                  //
        $frmfax=$row['fax'];                            //
        $frmpagweb = $row['paginaweb'];                 //
        $frmmail=$row['email'];                         //        
        $actividad = $row['actividad'];                 //
        $actividad21 = $row['actividad21'];             //
        $actividad22 = $row['actividad22'];             //                         
        $frmciiu=$row['clase_ciiu'];
        $frmclaseciiu=$row['descripcion_clase_ciiu'];   //
        $frmseccionciiu=$row['seccion_ciiu'];             //        
        $typeencuesta=$row['nro_formulario'];             //        
        $frmseccionciiu=$row['descripcion_seccion_ciiu'];   //
        $nombrecomercial=$row['nombre_comercial'];      //                        
        //falta provincia
        //$resultado2 = kdjdujerhrjhgnvbdybyrg($cadenauno,'http://200.105.134.19:10080/wsInfoBoletas/servdata.asmx?WSDL');
        //Se trabaja con las variables recuperadas y se las transforma en variables que se puedan almacenar en la base de datos
        $societarioxtype=OPERATOR::getDbValue("select tiso_uid from  par_tipos_societarios where tiso_description like '".$tiposocie."' and tiso_sw_active='ACTIVE' and tiso_delete=0");
        //Se recupera el Id_tiposocietario
        //echo "select tiso_uid from  par_tipos_societarios where tiso_description like '".$tiposocie."' and tiso_sw_active='ACTIVE' and tiso_delete=0";
        //echo $societarioxtype;
        $frmxdepto=OPERATOR::getDbValue("select dept_uid from par_departamentos where dept_description like '".$frmdepto."' and delete_status='ACTIVE' and dept_delete=0");
        //Se recupera el Id_departamento
        //echo "select dept_uid from par_departamentos where dept_description like '".$frmdepto."' and delete_status='ACTIVE' and dept_delete=0";
        //echo $frmxdepto;
        $frmxprov_uid=OPERATOR::getDbValue("select muni_prov_uid from par_municipios where muni_description like '".$frmmunicipio."' and muni_delete=0");        
        //echo "select muni_prov_uid from par_municipios where muni_description like '".$frmmunicipio."' and muni_delete=0";
        //echo $frmxprov_uid;
        $frmxprovi=OPERATOR::getDbValue("select prov_uid from par_provincias where prov_dept_uid=".$frmxdepto." and prov_delete=0");
        //echo "select prov_uid from par_provincias where prov_dept_uid=".$frmxdepto." and prov_delete=0";
        //echo $frmxprovi;
        $frmxmuni=OPERATOR::getDbValue("select muni_uid from par_municipios where muni_prov_uid='".$frmxprovi."' and muni_description like '".$frmmunicipio."' and muni_delete=0");
        //echo "select muni_uid from par_municipios where muni_prov_uid='".$frmxprovi."' and muni_description like '".$frmmunicipio."' and muni_delete=0";
        //echo "<br> valores: $razonsoc:$razonsoc tiposocie:$tiposocie societariotype:$societariotype frmdepto:$frmdepto frmxdepto:$frmxdepto";
        //echo $frmxmuni;
        $frmxgestion=OPERATOR::getDbValue("select gest_uid from adm_gestion where gest_sw_active='1'");
        //echo "select gest_uid from adm_gestion where gest_sw_active='1'";
        //echo $frmxgestion;
        $uid_token = OPERATOR::getDbValue( "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$aUser["usr_uid"]."' ORDER BY suv_date DESC LIMIT 0,1 " );
        //echo "SELECT suv_uid FROM sys_users_verify WHERE suv_cli_uid = '".$aUser["usr_uid"]."' ORDER BY suv_date DESC LIMIT 0,1 ";
        //echo $frmxgestion;
        $frmxregisuid=OPERATOR::getDbValue("select regi_uid from sys_registros where regi_user_uid='".$aUser["usr_uid"]."' and regi_gest_uid=".$frmxgestion." and regi_form_uid=".$typeencuesta);
        //echo "select regi_uid from sys_registros where regi_user_uid='".$aUser["usr_uid"]."' and regi_gest_uid=".$frmxgestion." and regi_form_uid=".$typeencuesta;
        //echo "<br>--".$frmxregisuid."--<br>";        
        if(!$frmxregisuid){
            $ssqlupddata="INSERT INTO sys_registros (regi_uid, regi_user_uid, regi_gest_uid, regi_form_uid, regi_movco, regi_swmodifica_uid, regi_createdate, regi_updatedate) VALUES (NULL, '".$aUser["usr_uid"]."', '0', '".$typeencuesta."', 'YES', '1', now(), now())";
            //echo "<br>".$ssqlupddata;
            $db2->query($ssqlupddata);            
            $frmxregisuid=OPERATOR::getDbValue("SELECT LAST_INSERT_ID() as UID");
        }
        //verificar los campos que se debe almacenar antes de iniciar el proceso de llenado de datos de los formularios
        $ssqlupddata="INSERT INTO cap1_informacion_general(inge_regi_uid, inge_formulario, inge_ciiu, inge_clase_ciiu, inge_razonsocial, inge_tiso_uid, inge_nombrecomercial, inge_nit, inge_matriculadecomercio,".
        " inge_depa_uid, inge_nombre_departamento, inge_provi_uid, inge_nombre_provincia, inge_muni_uid, inge_nombre_municipio, inge_ciudad, inge_zona, inge_calle, inge_referenciacalle, inge_telefono, inge_celular, inge_fax, inge_pagweb, inge_email, inge_afiliacion_camara, ".
        " inge_afiliacion_federacion, inge_afiliacion_asociacion, inge_afiliacion_otros, inge_afilia_ninguno, inge_actividad_principal, inge_actividad_secundaria1, ".
        " inge_actividad_secundaria2, inge_datecreate, inge_dateupdate, inge_delete, inge_suv_uid) VALUES (".
        " '".$frmxregisuid."', '".$typeencuesta."', '".$frmciiu."', '".$frmclaseciiu."', '".$razonsoc."', '".$societarioxtype."', '$nombrecomercial', '".$frmnit."', '".$frmmatricula."',".
        " '".$frmxdepto."', '".$frmdepto."', '".$frmxprovi."', '".$frmprovincia."', '".$frmxmuni."', '".$frmmunicipio."', '".$frmciudad."', '".$frmzona."', '".$frmcalle."', '".$frmreferencia."', '".$frmtelefono."', '".$frmcelular."', '".$frmfax."', '".$frmpagweb."', '".$frmmail."', ''".
        " , '', '', '', '0', '".$actividad."', '".$actividad21."', '".$actividad22."', now(), now(), '0', '".$uid_token."')";
        //echo "<br>".$ssqlupddata;
        $db2->query($ssqlupddata);
        $activate = 1; // activada
                     
            } else {
                echo "Lo sentimos no existe un número de matricula válido registrado 1";  //mandar mail a email
                $activate=3;
                //enviar un correo a administraciòn con el número de matrícula de comercio para su respectivo control
                //enviar otro correo al que registro indicando esta anomalía
                }
                /*
        }            
        mysqli_close($link);
        //echo "se cierra la conexión";*/
}   
unset($_POST);	
header("Location: index2.php?act=".$activate);
?>