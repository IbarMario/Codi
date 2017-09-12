<?php
/********************************************************
 * modificado por wilfredo mendoza
 * MDPYEC-VPIMGE -----  MARZO 2015
 ********************************************************/
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />    
    <meta name="description" content="Inicio" />
    <title>Formulario de Encuesta Comercio y Servicios</title>    
    <meta name="keywords" content="Inicio" />
    <link href="../css/layout.css" rel="stylesheet" type="text/css" />    
    <link rel="shortcut icon" href="lib/favicon.ico"   type="image/x-icon"/>    
    <script type="text/javascript" src="../js/jquery.min.js"></script>   
    <script type="text/javascript" src="js/bol1.js"></script>    
</head>
<body>       
    
<?php    
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
$idinterno = OPERATOR::toSql(safeHTML(OPERATOR::getParam("idinterno")),'Text');
//echo $matricula;
//echo $usuarioid;
$cadenauno = $matricula;
$sEmail = OPERATOR::toSql(safeHTML(OPERATOR::getParam("email")),'Text');
$passwd = OPERATOR::toSql(safeHTML(OPERATOR::getParam("passwd")),'Text');
$query = "SELECT * FROM t_usuarios WHERE usr_uid = '".$idinterno."' LIMIT 0,1 ";
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
        //controla que exista con nro. matrícula, usuario, idboleta
        $sql = "SELECT * FROM sys_users WHERE (usr_login = '".$cadenauno."' AND usr_usuario_id = '".$idinterno."' AND usr_id_boleta = '".$idboleta."' AND usr_delete = 0 )";
        //echo $sql;
        $db->query( $sql );    
        if( $db->numrows() > 0 ) {
            $row1 = $db->next_record();            
            $nroregistrousr = $row1['usr_uid'];
            //echo "Existe el registro para ser Eliminado  ---> ".$nroregistrousr."<br>";
            $sql = "SELECT * FROM sys_registros WHERE (regi_user_uid = '".$nroregistrousr."')";
            //echo $sql;
            $db->query( $sql );    
            if( $db->numrows() > 0 ) {
                $row1 = $db->next_record();            
                $claveregistro = $row1['regi_uid'];
                //echo "Existe el registro para ser Eliminado  ---> ".$nroregistrousr."<br>";
            ?>
    <!-- begin body -->
    <div id="wrpB">        
        <div class="headerB">
            <a href="#" class="logo"><img src="<?php echo $domain; ?>../lib/logo_b.jpg" alt="Ministerio" width="298" height="97" /></a></div>
            <div class="contentB">
                <p>
                    Se encontró el registro <br>
                    VERIFIQUE QUE LOS DATOS CORRESPONDAN AL FORMULARIO QUE DESEA ELIMINAR </br>
                </p>

                <!-- TABLA DE DATOS GENERALES -->
                <table class="fOpt">
                    <thead>
                        <tr>
                            <th colspan="2">DATOS GENERALES DE LA EMPRESA</th>
                        </tr>
                    </thead>
                    <tbody>
                        <tr>                        
                            <td colspan="2"><span class="bold">Raz&oacute;n social o denominaci&oacute;n:</span> 
                            <label class="labB"><?php echo $razonsocial; ?></label></td>
                        </tr>
                        <tr>                        
                            <td><span class="bold">N&ordm; de Matr&iacute;cula de Comercio:</span> 
                                <label class="labB"><?php echo $matricula; ?></label>
                            </td>
                            <td><span class="bold">Id. Boleta:</span>
                                <label class="labB"><?php echo $idboleta; ?></label>
                            </td>
                        </tr>                            
                     </tbody>
              </table>
            <table class="fOpt">
                    <thead>
                        <tr>
                            <th colspan="2">DATOS GENERALES DE LA PERSONA QUE REGISTRO LOS DATOS DE LA ENCUESTA</th>
                        </tr>
                    </thead>
                    <tbody>
                    <tr>                        
                        <td colspan="2"><span class="bold">Nombres y Apellidos:</span> 
                            <label class="labB"><?php echo $nombres." ".$paterno." ".$materno;?></label></td>
                        </tr>
                        <tr>                        
                            <td><span class="bold">C&eacute;dula de Identidad:</span> 
                                <label class="labB"><?php echo $ciuser." ".$expciusr; ?></label></td>
                                <tr>                        
                            <td><span class="bold">Correo Eléctrónico:</span>
                                <label class="labB"><?php echo $sEmail; ?></label></td>
                       </tr>
                       <tr>                        
                            <td><span class="bold">N&uacute;mero de Registro:</span> 
                                <label class="labB"><?php echo $nroregistrousr; ?></label></td>
                            <tr>                                                            
                       </tr>     
              </tbody>
         </table>                                                           
                
<!------------------------------->                
       <?php              
    echo "Modulo C - Uso y acceso de las Tecnologías de la Información TICs  --> ";
    //elimina datos de la empresa del capitulo final al inicio por tema de disñeo de base de datos
    $sql = "select * FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid = '$claveregistro'";
    //echo $sql;
    $db -> query($sql);
    echo "Contados -> ".$db->numrows()."<br>";       
    //1
    if ($sw1 == 0){
        echo "Modulo C - 1 Aplicaciones de Software --> ";
        $sql = "select * FROM frm1_ccap1_2aplicaciones WHERE apli_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //2
    if ($sw1 == 0){
        echo "Modulo A - 9 Formación de Activos  --> ";
        $sql = "select * FROM frm1_cap9_formacionactivosfijos WHERE foaf_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";       
    }
    //3
    if ($sw1 == 0){
        echo "Modulo A - 8 Resultados de la Gestión  --> ";
        $sql = "select * FROM frm1_cap8_resultadosgestion WHERE rege_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //4
    if ($sw1 == 0){
        echo "Modulo A - 7 Venta de Mercadería o Servicios  --> ";
        $sql = "select * FROM frm1_cap7_ventaservicios WHERE vese_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //5
    if ($sw1 == 0){
        echo "Modulo A - 7 Meses de mayor Ingreso  --> ";
        $sql = "select * FROM frm1_cap7_2mesesmayorventa WHERE memv_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);   
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //6
    if ($sw1 == 0){
        echo "Modulo A - 6 Compra de Mercadería para Reventa  --> ";
        $sql = "select * FROM frm1_cap6_comprareventa WHERE core_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);
        echo "Contados -> ".$db->numrows()."<br>";        
    }
    //7
    if ($sw1 == 0){
        echo "Modulo A - 5 Otros Gastos Operativos  --> ";
        $sql = "select * FROM frm1_cap5_otrosgastosoperativos WHERE otga_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //8
    if ($sw1 == 0){
        echo "Modulo A - 4 Inventario de Materiales  --> ";
        $sql = "select * FROM frm1_cap4_inventariomateriales WHERE inma_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);   
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //9
    if ($sw1 == 0){
        echo "Modulo B - 3 Responsabilidad Social Empresarial  --> ";
        $sql = "select * FROM frm1_bcap3_responsabilidadsocial WHERE gece_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);   
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //10
    if ($sw1 == 0){
        echo "Modulo B - 2 Sistema de Gestión de certificados  --> ";
        $sql = "select * FROM frm1_bcap2_gestioncertificados WHERE gece_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //11
    if ($sw1 == 0){
        echo "Modulo A - 10 Capital y Patrimonio  --> ";
        $sql = "select * FROM frm1_cap10_capitalpatrimonio WHERE capa_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //12
    if ($sw1 == 0){
        echo "Modulo B - 1 Gestión Ambiental  --> ";
        $sql = "select * FROM frm1_bcap1_certificadosambientales WHERE ceam_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";        
    }
    //13
    if ($sw1 == 0){
        echo "Modulo B - 1 Certificados  --> ";
        $sql = "select * FROM frm1_bcap1_certificados WHERE cert_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
    //14
    if ($sw1 == 0){
        echo "Modulo A - 3 Suministros  --> ";
        $sql = "select * FROM cap3_suministros WHERE sumi_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
    //15
    if ($sw1 == 0){
        echo "Modulo A - 2 Prestaciones Sociales   --> ";
        $sql = "select * FROM cap2_presta_sociales WHERE prso_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
   //16 
    if ($sw1 == 0){
        echo "Modulo C - 1 Uso y Acceso de Tecnologías de la Información  --> ";
        $sql = "select * FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
   //17
    if ($sw1 == 0){
         echo "Modulo A - 2 Personal Ocupado, Sueldos y Salarios  -->";
        $sql = "select * FROM cap2_personalsueldos WHERE pesu_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
    //18
    if ($sw1 == 0){
        echo "Modulo A - 2.2 Otros Pagos al Personal  -->";
        $sql = "select * FROM cap2_otros_pagos WHERE otpa_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
    //19
    if ($sw1 == 0){
        echo "Modulo A - 1 Identificación y ubicación de la empresa -->";
        $sql = "select * FROM cap1_informacion_general WHERE inge_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
    //20
    if ($sw1 == 0){
        echo "Modulo 0 - 1 Asignación de número de Registro  -->";
        $sql = "select * FROM sys_registros WHERE regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
    //21
    if ($sw1 == 0){
        echo "Modulo 0 - 0 Registro de Número de matrícula -->";
        $sql = "select * FROM sys_users WHERE usr_uid = '$nroregistrousr'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
    }
?>
<!-------------------------------->                
<!-- ENTREGADO POR -->            
            <form class="formA validable" action="confirma_eliminado.php" method="post" style="text-align: center;">
                    <fieldset>                        
                          <input type="hidden" name="ai_transcriptor" id="ai_transcriptor" value="<?php echo $idtranscriptor; ?>"  />
                          <input type="hidden" name="ai_codigo" id="ai_codigo" value="<?php echo $codigo; ?>"  />
                          <input type="hidden" name="ai_nro_registro" id="ai_nro_registro" value="<?php echo $regisroUID; ?>"  />    
                          <input type="hidden" name="nroregistrousr" id="nroregistrousr" value="<?php echo $nroregistrousr; ?>"  />                                                                       
                          <input type="hidden" name="nromatricula" id="nromatricula" value="<?php echo $matricula; ?>"  />        
                          <input type="hidden" name="claveregistro" id="claveregistro" value="<?php echo $claveregistro; ?>"  />                                
                          <input type="hidden" name="usuarioid" id="usuarioid" value="<?php echo $usuarioid; ?>"  />
                          <input type="hidden" name="nroencuesta" id="nroencuesta" value="<?php echo $nroencuesta; ?>"  />
                          <input type="hidden" name="operador" id="operador" value="<?php echo $idinterno; ?>"  />    
                          <input type="hidden" name="encontrado" id="encontrado" value="<?php echo $encontrado; ?>"  />
                          <input type="hidden" name="idboleta" id="idboleta" value="<?php echo $idboleta; ?>"  />
                          
                          <span class="bold">Fecha Actual: <?php echo date("Y-m-d H:i:s"); ?></span>
                        <p><span class="contChk">                                                              
                            <input type="checkbox" name="chkconforme" id="chkconforme" class="chk" />
                            <label class="labChkB2">Se ha confirmado el registro a Eliminar</label>
                        </span></p>
                        <span class="bxBt">                                  
                            <input type="submit" value="  ELIMINAR  " id="sendData" style="display:none" name="continuarregistro" class="buttonB" />                                
                            <a href="administracion.php" class="btnS">CANCELAR</a>                            
                        </span>                   
                    </fieldset>
                </form>                
            </div>        
    </div>
    </body>
    </html>            
    <?php                        
        //Registro realizado
    } else {
            echo "No Existe el registro para ser eliminado 1<br><br>".$nroregistrousr;
            echo "<a href=\"index.php\">Continuar</a>";
            $msg = "El Registro en los archivos de inicio no existe.".$nroregistrousr;
            $msg = 3;                            
            echo '<script type="text/javascript">window.location.href="frm_matricula.php?$iMsXa09="+idUser </script>';
        }
        } else {
            echo "No Existe el registro para ser eliminado --> ".$cadenauno."<br><br>";
            echo "<a href=\"index.php\">Continuar</a>";
            $msg = "La matrícula de comercio no existe en el Padrón Empresarial.".$nroregistrousr;
            $msg = 3;                            
            echo '<script type="text/javascript">window.location.href="frm_matricula.php?$iMsXa09="+idUser </script>';
        }
        // hasta aqui el proceso de envio de datos        
      } else {
            echo "No Existe el registro en el Padron Empresarial para ser eliminado..<br><br>";
            echo "<a href=\"index.php\">Continuar</a>";          
            $msg = "La matrícula de comercio no existe en el Padrón Empresarial.";
            $msg = 7;
            $usuarioid = $usuarioid . "_" . $msg;
            echo $usuarioid;
            echo "<script>var idUser = '$usuarioid';</script>";            
            echo '<script type="text/javascript">window.location.href="frm_matricula.php?$iMsXa09="+idUser </script>';        
      }
} 
//unset($_POST);
//header("Location: index.php?msg=".$msg);
//unset($_POST);
//header("Location: frm_matricula.php?msg=".$msg);
?>