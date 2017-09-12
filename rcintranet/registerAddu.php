<?php
/********************************************************
 * modificado por wilfredo mendoza
 * MDPYEC-VPIMGE -----  MARZO 2015
 ********************************************************/
include_once("connection/database/connection.php");
include_once("connection/core/operator.php");

header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//require_once('jasgvhsbhsdflsbushdfuishadfuashdf.php');
//require_once('kasgvhsbhsdflsbushdfuishadfuashdf.php');
//recibe el token y se le coloca como codigo de activación
//definición de variables
$comilla='"';
$apostrofe="'";
$swcomilla = 0;

$link='';
$razonsocial='';
$nombreasociacion='';
$nroformulario=0;
$typeencuesta=0;
$encontrado=0;
//recepción de datos de entrada incluyendo la matrícula de comercio
$nombres = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("nombres")),'Text'));
$paterno = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("paterno")),'Text'));
$materno = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("materno")),'Text'));
$ciuser = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ciusr")),'Text');
$expciusr = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("expciusr")),'Text'));
$matricula = OPERATOR::toSql(safeHTML(OPERATOR::getParam("nromatricula")),'Text');
$usuarioid = strtoupper(OPERATOR::toSql(safeHTML(OPERATOR::getParam("idusuario")),'Text'));
$idboleta = OPERATOR::toSql(safeHTML(OPERATOR::getParam("idboleta")),'Text');

//echo $matricula;
//echo $usuarioid;
$cadenauno = $matricula;
$sEmail = OPERATOR::toSql(safeHTML(OPERATOR::getParam("email")),'Text');
$passwd = OPERATOR::toSql(safeHTML(OPERATOR::getParam("passwd")),'Text');
$query = "SELECT * FROM t_usuarios WHERE usr_uid = '".$usuarioid."' LIMIT 0,1 ";
//echo $query;
$db3->query( $query );
//echo $db3->numrows();
if( $db3->numrows() > 0 ) {
    $row = $db3->next_record();
    //echo "Existe en la Base de datos Empresarial Activa...";
    $usr_uid = $row['usr_uid'];
    $usr_login = $row['usr_login'];
    $passwd = $row['usr_pass'];
    $sEmail = $row['usr_email'];
    $ciuser = $row['usr_ci'];
    $expciusr = $row['usr_ci_exp'];
    $nombres = $row['usr_nombres'];
    $paterno = $row['usr_paterno'];
    $materno = $row['usr_materno'];

//echo "Matricula->".$matricula."<br>";
//echo "cadenauno->".$cadenauno."<br>";
//echo $nombres;
//echo $paterno;
//echo $materno;
//echo $ci;
//echo $ci_exp;
//echo $login;
//echo $passwd;
//echo $sEmail;
//echo ("<br>");
//if ($stat === 0) {
//echo 'Conexión establecida';
$query = "SELECT * FROM padron_empresarial WHERE matricula = '".$cadenauno."' LIMIT 0,1 ";
//echo $query;
$db3->query( $query );
//echo $db3->numrows();
if( $db3->numrows() > 0 ) {
    $row = $db3->next_record();
    //echo "Existe en la Base de datos Empresarial Activa...";
    $razonsocial = $row['razon_social'];
    $actividad = $row['actividad'];        
    $nroformulario = $row['nro_formulario'];
    $encontrado = 1;          
    $typeencuesta=$nroformulario;
    $sql = "SELECT * FROM sys_users WHERE usr_login = '".$cadenauno."' AND usr_delete = 0 ";
    //echo $sql;
    $db->query( $sql );
    //REGISTRO PRINCIPAL EN SYS_USERS que es el inicio de todo
    $sql = " INSERT INTO sys_users ( usr_login, usr_pass, usr_email, usr_nombres, usr_paterno, usr_materno, usr_ci, usr_ci_exp, usr_status, usr_delete, usr_sw_ref, usr_datecreate, usr_dateupdate, usr_usuario_id, usr_id_boleta) "
            ." VALUES ( '".$matricula."', '".$passwd."', '".$sEmail."', '".$nombres."', '".$paterno."', '".$materno."', '".$ciuser."', '".$expciusr."', 'INACTIVE', '0', '1', NOW(), NOW(), '".$usuarioid."', '".$idboleta."' )";
      //echo $sql;
    //Registro realizado
    if( $db->numrows() > 0 ) {
            //echo "Existe el registro";
            $msg = 3;	//user existe registrado en sys_users
            $usuarioid = $usuarioid . "_" . $msg;
            echo $usuarioid;
            echo "<script>var idUser = '$usuarioid';</script>";            
            echo '<script type="text/javascript">window.location.href="frmMatricula.php?$iMsXa09="+idUser </script>';
    } else {
            //echo "No Existe el registro";
            if(  !empty($matricula) && !empty($sEmail)  && !empty($passwd) && !empty($ciuser) && !empty($expciusr) ) {
            $sql = " INSERT INTO sys_users ( usr_login, usr_pass, usr_email, usr_nombres, usr_paterno, usr_materno, usr_ci, usr_ci_exp, usr_status, usr_delete, usr_sw_ref, usr_datecreate, usr_dateupdate, usr_usuario_id, usr_id_boleta) "
            ." VALUES ( '".$matricula."', '".$passwd."', '".$sEmail."', '".$nombres."', '".$paterno."', '".$materno."', '".$ciuser."', '".$expciusr."', 'INACTIVE', '0', '1', NOW(), NOW(), '".$usuarioid."', '".$idboleta."')";
            $db->query($sql);
            
            //echo ($sql);            
            $db->query( "SELECT LAST_INSERT_ID() as id" );
            $aUser = $db->next_record();

            $new_usruid =$aUser["id"];
            $sToken = md5($new_usruid."-".$matricula."-".$sEmail."-tok");
            //Se envia a la pagina que debe recibir el token 
            //$sValUrl = $domain."/register.php?act=".$sToken;
            //enviar datos a login para continuar el trabajo
            // die($sValUrl);
            $msg = 1;
            // para su activacion en cualquier momento
            //echo "<script>var token = '$sToken';</script>";
            //echo '<script type="text/javascript">window.location.href="register.php?act="+token </script>';                        
            //se copia lo que hace register
            $codigoactivacion = $sToken;
            //echo $codigoactivacion;
            //echo "codigo de Activación ".$codigoactivacion;
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
                $query = "SELECT * FROM padron_empresarial WHERE matricula = '".$cadenauno."' LIMIT 0,1 ";  // se pide todos los datos de la base del BEA    
                //echo $query;
                $db3->query( $query );
                if( $db3->numrows() > 0 ) {
                    $row = $db3->next_record();
                    //echo "sacar todos los campos necesarios de la base de datos empresarial";
                    $razonsocial = $row['razon_social'];    //se tiene en
                    $frmcalle=$row['direccion']; 
                    
                    //proceso para las 
                    $comilla='"';
                    $swcomilla = 0;
                    $pos = strpos($razonsocial, $comilla);                    
                    if ($pos === false) {
                       //echo "La cadena '$comilla' no fue encontrada en la cadena '$razonsocial'";
                       $swcomilla = 0;
                       $pos = strpos($frmcalle, $comilla);                    
                        if ($pos === false) {
                           //echo "La cadena '$comilla' no fue encontrada en la cadena '$razonsocial'";
                           $swcomilla = 0;

                        } else {
                           //echo "La cadena '$comilla' fue encontrada en la cadena '$razonsocial'";
                           //echo " y existe en la posición $pos";
                           $swcomilla = 1;
                        }                       
                    } else {
                       //echo "La cadena '$comilla' fue encontrada en la cadena '$razonsocial'";
                       //echo " y existe en la posición $pos";
                       $swcomilla = 1;
                    }
                    
                    $apostrofe="'";                    
                    $pos = strpos($razonsocial, $apostrofe);
                    // Nótese el uso de ===. Puesto que == simple no funcionará como se espera
                    // porque la posición de 'a' está en el 1° (primer) caracter.
                    if ($pos === false) {
                        //echo "La cadena '$apostrofe' no fue encontrada en la cadena '$razonsocial'";
                        if ($swcomilla == 1){
                            }
                    } else {
                        //echo "La cadena '$apostrofe' fue encontrada en la cadena '$razonsocial'";
                        //echo " y existe en la posición $pos";                       
                        if ($swcomilla == 1){
                            $swcomilla = 3;
                        } else {
                            $swcomilla = 2;
                        }
                    }
                    //echo "<br>Comilla pos". $swcomilla;
                    // porque la posición                    
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
                    //
                    if ($swcomilla == 1){
                        //existe comillas
                        $ssqlupddata="INSERT INTO cap1_informacion_general(inge_regi_uid, inge_formulario, inge_ciiu, inge_clase_ciiu, inge_razonsocial, inge_tiso_uid, inge_nombrecomercial, inge_nit, inge_matriculadecomercio,".
                        " inge_depa_uid, inge_nombre_departamento, inge_provi_uid, inge_nombre_provincia, inge_muni_uid, inge_nombre_municipio, inge_ciudad, inge_zona, inge_calle, inge_referenciacalle, inge_telefono, inge_celular, inge_fax, inge_pagweb, inge_email, inge_afiliacion_camara, ".
                        " inge_afiliacion_federacion, inge_afiliacion_asociacion, inge_afiliacion_otros, inge_afilia_ninguno, inge_actividad_principal, inge_actividad_secundaria1, ".
                        " inge_actividad_secundaria2, inge_datecreate, inge_dateupdate, inge_delete, inge_suv_uid) VALUES (".
                        " '".$frmxregisuid."', '".$typeencuesta."', '".$frmciiu."', '".$frmclaseciiu."', '".$razonsoc."', '".$societarioxtype."', '".$nombrecomercial."', '".$frmnit."', '".$frmmatricula."',".
                        " '".$frmxdepto."', '".$frmdepto."', '".$frmxprovi."', '".$frmprovincia."', '".$frmxmuni."', '".$frmmunicipio."', '".$frmciudad."', '".$frmzona."', '".$frmcalle."', '".$frmreferencia."', '".$frmtelefono."', '".$frmcelular."', '".$frmfax."', '".$frmpagweb."', '".$frmmail."', ''".
                        " , '', '', '', '0', '".$actividad."', '".$actividad21."', '".$actividad22."', now(), now(), '0', '".$uid_token."')";                    
                        //copia
                    } else {                                        
                        //existe apostrofes
                        $ssqlupddata='INSERT INTO cap1_informacion_general(inge_regi_uid, inge_formulario, inge_ciiu, inge_clase_ciiu, inge_razonsocial, inge_tiso_uid, inge_nombrecomercial, inge_nit, inge_matriculadecomercio,'.
                        ' inge_depa_uid, inge_nombre_departamento, inge_provi_uid, inge_nombre_provincia, inge_muni_uid, inge_nombre_municipio, inge_ciudad, inge_zona, inge_calle, inge_referenciacalle, inge_telefono, inge_celular, inge_fax, inge_pagweb, inge_email, inge_afiliacion_camara, '.
                        ' inge_afiliacion_federacion, inge_afiliacion_asociacion, inge_afiliacion_otros, inge_afilia_ninguno, inge_actividad_principal, inge_actividad_secundaria1, '.
                        ' inge_actividad_secundaria2, inge_datecreate, inge_dateupdate, inge_delete, inge_suv_uid) VALUES ('.
                        ' "'.$frmxregisuid.'", "'.$typeencuesta.'", "'.$frmciiu.'", "'.$frmclaseciiu.'", "'.$razonsoc.'", "'.$societarioxtype.'", "'.$nombrecomercial.'", "'.$frmnit.'", "'.$frmmatricula.'", '.
                        ' "'.$frmxdepto.'", "'.$frmdepto.'", "'.$frmxprovi.'", "'.$frmprovincia.'", "'.$frmxmuni.'", "'.$frmmunicipio.'", "'.$frmciudad.'", "'.$frmzona.'", "'.$frmcalle.'", "'.$frmreferencia.'", "'.$frmtelefono.'", "'.$frmcelular.'", "'.$frmfax.'", "'.$frmpagweb.'", "'.$frmmail.'", ""'.
                        ' , "", "", "", "0", "'.$actividad.'", "'.$actividad21.'", "'.$actividad22.'", now(), now(), "0", "'.$uid_token.'")';
                    }
                    //echo "<br>".$ssqlupddata;
                    $db2->query($ssqlupddata);
                    $activate = 1;  //activada
                    //se copia desde el tercero para ingresar
                    //login.php
                    
                    
                    //echo $matricula;
                    //echo $sEmail;
                    //echo $passwd;
                    $email = $sEmail;
                    //echo "email".$email;
                    //echo "Se incorporó correctamente";
                    
                    
                    //include_once("../connection/database/connection.php");
                    //include_once("../connection/core/operator.php");
                    //echo "login bienvenida";
                    //$matricula = OPERATOR::toSql( safeHTML(OPERATOR::getParam("matric")), "Number");
                    //$email = OPERATOR::toSql( safeHTML(OPERATOR::getParam("email")), "Text" );
                    //$passwd = OPERATOR::toSql( safeHTML(OPERATOR::getParam("passwd")), "Text" );

                    $path_parts = pathinfo($_SERVER['HTTP_REFERER']);
                    $referer = $path_parts['dirname'].'//'.$path_parts['basename'];

                    $dom1 = parse_url($referer) ;
                    $dom2 = parse_url($domain) ;

                    /*echo "$path_parts->".$path_parts."<br>";
                    echo "$referer->".$referer."<br>";
                    echo "$dom1->".$dom1."<br>";
                    echo "$dom2->".$dom2."<br>";*/

                    function checkEmpty($var) {
                        //echo "$var->".$var."<br>";
                        if (strlen($var) >= 1) {
                            return false; 
                        } else {
                            return true;
                        }
                    }

                    if ( isset($matricula) && isset($email) && isset($passwd)) {
                        if ( $dom1["host"] == $dom2["host"] ) {
                            //echo "segundo if";
                            $validMatricula = array('options' => array('regexp' => "/^[0-9]{3,8}$/")); // matricula valida longitud entre 3 y 8 
                            $validPass = array('options' => array('regexp' => "/^[a-zA-Z0-9+�����A�����������\\�����*.,;:)(�_@><#&��!=|?%$'\-\/\"]*$/")); // Pasword valido
                            $matricula= filter_var($matricula, FILTER_VALIDATE_REGEXP, $validMatricula);
                            $email = filter_var($email, FILTER_SANITIZE_EMAIL);
                            $passwd = filter_var($passwd, FILTER_VALIDATE_REGEXP, $validPass);
                            /*echo $matricula."<br>";
                            echo $email."<br>";
                            echo $passwd."<br>";*/
                            if ( isset($matricula) && isset($email) && isset($passwd) ) {
                                $sql2 = "SELECT * FROM sys_users WHERE usr_login LIKE '" . $matricula . "' AND  usr_pass = md5('" . $passwd . "') AND usr_email = '" . $email . "' AND usr_status = 'ACTIVE' AND usr_delete = 0 ";
                                $sql2 = "SELECT * FROM sys_users WHERE usr_login LIKE '" . $matricula . "' AND  usr_pass = '" . $passwd . "' AND usr_email = '" . $email . "' AND usr_status = 'ACTIVE' AND usr_delete = 0 ";
                                //echo $sql2."<br>";
                                $db->query( $sql2 );
                                $numfiles = $db->numrows();
                                //echo $numfiles."<br>";
                                if ($numfiles == 0) {
                                    header('Location: index_1.php?message=1');   //index.php inicia nuevamente 
                                } else {
                                    $datos = $db->next_record();
                                  //  echo "Datos.usr_uid".$datos["usr_uid"];
                                    ///echo "tiene datos";
                                    session_set_cookie_params(100 * 100);
                                    @session_start();   //inicio de session para el usuario actual
                                    $_SESSION[SITE]["authenticated"] = true;
                                    $_SESSION[SITE]["usr_uid"] = $datos["usr_uid"];
                                    $_SESSION[SITE]["usr_login"] = $datos["usr_login"];
                                    $_SESSION[SITE]["usr_email"] = $datos["usr_email"];
                                    $_SESSION[SITE]["uidtipoformulario"] = $datos["usr_form_uid"];
                                    $_SESSION[SITE]["typeusrform"] = $datos["usr_sw_ref"];                
                                    $frmxgestion=OPERATOR::getDbValue("select gest_uid from adm_gestion where gest_sw_active='1'");
                    $sqle="select regi_uid, regi_swmodifica_uid from sys_registros where regi_user_uid='".$datos["usr_uid"]."' ORDER BY regi_uid DESC LIMIT 1 ";
                    //echo $sqle."<br>";
                                   $db2->query($sqle);
                                   $aReg = $db2->next_record();
                                   $frmxregisuid = $aReg["regi_uid"];
                                   $frmstate = $aReg["regi_swmodifica_uid"];
                                   $_SESSION[SITE]["val_regi_swmodifica_uid"] = $frmstate;
                                   $_SESSION[SITE]["registro_uid"]=$frmxregisuid;
                                   $tokenFront = sha1(PREFIX . uniqid(rand(), TRUE));
                                   $_SESSION[SITE]["TOKEN_FRONT"] = $tokenFront;

                                   $sSQL = "update sys_users_verify set suv_status=1 where suv_cli_uid='" . $datos["usr_uid"] . "'";
                                   //actualiza el estatus sys_users_verify 
                                   //echo $sSQL."<br>";
                                   $db->query($sSQL); 

                                   $sSQL = "insert into sys_users_verify values (null," . $datos["usr_uid"] . ",'" . $tokenFront . "',now(),'" . $_SERVER['REMOTE_ADDR'] . "',0,'" . $_SERVER['HTTP_USER_AGENT'] . "')";
                                   //echo $sSQL."<br>";
                                   $db->query($sSQL);
                          /*       echo "Salió de los SQL para entrar a distribuir a los formularios<br>";               
                                   echo "$frmstate->".$frmstate."<br>";               
                                   echo "$datos[usr_form_uid]->".$datos["usr_form_uid"]."<br>";
                                   echo "$_SESSION[SITE][uidtipoformulario]->".$_SESSION[SITE]["uidtipoformulario"]."<br>";*/
                                   //echo $frmstate."<br>"; 
                                   //echo $datos["usr_form_uid"];
                                   if( !checkEmpty($frmstate) && $frmstate == 0 && $datos["usr_form_uid"]!=1 ) {
                                       //echo "errorlllll";
                                        //echo "[uidtipoformulario] if->".$_SESSION[SITE]["uidtipoformulario"]."<br>";
                                        switch( $_SESSION[SITE]["uidtipoformulario"] ) {                    
                                        case 1: header('Location: modcose/bol.php'); break; //registro de comercio y servicios
                                        case 2: header('Location: modenin/bol.php'); break;   //registro agroindustria
                                        case 3: header('Location: modagin/bol.php'); break;    //registro de industrias manufactureras
                                    }                    
                                } else {
                                    //echo "de login";
                                    //echo "deberia trasladarse a option, para distribuir";                         
                                    header('Location: option.php');         // salio de por aquí       
                                }
                            }
                        } else {
                            $message = OPERATOR::toSql(safeHTML(OPERATOR::getParam("message")), 'Number') + 1;
                            header('Location: index.php?message=1');
                        }
                    } else {
                        $message = OPERATOR::toSql(safeHTML(OPERATOR::getParam("message")), 'Number') + 1;
                        header('Location: index.php?message=1');
                    }
                    } else {
                        $message = OPERATOR::toSql(safeHTML(OPERATOR::getParam("message")), 'Number') + 1;
                        header('Location: index.php?message=1');
                    }                                                            
                    
                    
                    //login.php
                    //se copia desde el tercero para ingresar
                        } else {
                            echo "Lo sentimos no existe un número de matricula válido registrado ";    //mandar mail a email
                            $activate=3;
                            //enviar un correo a administraciòn con el número de matrícula de comercio para su respectivo control
                            //enviar otro correo al que registro indicando esta anomalía
                            }
                            /*
                    }            
                    mysqli_close($link);
                    //echo "se cierra la conexión";*/                                
            }                                                         
            
            //se copia lo que hace register
        } else {
            echo "No se pudo insertar";
            $msg = 2;
            $usuarioid = $usuarioid . "_" . $msg;
            echo $usuarioid;
            echo "<script>var idUser = '$usuarioid';</script>";            
            echo '<script type="text/javascript">window.location.href="frmMatricula.php?$iMsXa09="+idUser </script>';
      }
    }
    // hasta aqui el proceso de envio de datos        
  } else {
        $msg = "La matrícula de comercio no existe an la Base de datos Empresarial Activa. Favor de pasar por la oficinas de Registro de Comercio a la brevedad posible.";
        $msg = 7;
        $usuarioid = $usuarioid . "_" . $msg;
        echo $usuarioid;
        echo "<script>var idUser = '$usuarioid';</script>";            
        echo '<script type="text/javascript">window.location.href="frmMatricula.php?$iMsXa09="+idUser </script>';        
  }
} else {
    echo "Datos no válidos";
}
//unset($_POST);
//header("Location: index.php?msg=".$msg);
//unset($_POST);
//header("Location: frmMatricula.php?msg=".$msg);
?>