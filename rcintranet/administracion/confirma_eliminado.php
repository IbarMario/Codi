<?php session_start(); header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
//---------------------------------------------
// Modificado por Wilfredo Mendoza
// MDPyEP - VPIMGE
// JULIO - 2013
//---------------------------------------------
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
?>
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />    
    <title>Formulario de Encuesta Comercio y Servicios</title>
    <meta name="description" content="Inicio" />
    <meta name="keywords" content="Inicio" />
    <link href="../css/layout.css" rel="stylesheet" type="text/css" />    
    <link rel="shortcut icon" href="lib/favicon.ico"   type="image/x-icon"/>    
    <script type="text/javascript" src="../js/jquery.min.js"></script>   
    <script type="text/javascript" src="js/bol1.js"></script>    
</head>
<body>
<?php 
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

$nromatricula = OPERATOR::toSql(safeHTML(OPERATOR::getParam("nromatricula")),'Text');
$nroregistro = OPERATOR::toSql(safeHTML(OPERATOR::getParam("ai_nro_registro")),'Text');
$nroregistrousr = OPERATOR::toSql(safeHTML(OPERATOR::getParam("nroregistrousr")),'Text');
$claveregistro = OPERATOR::toSql(safeHTML(OPERATOR::getParam("claveregistro")),'Text');

$usuarioid = OPERATOR::toSql(safeHTML(OPERATOR::getParam("usuarioid")),'Text');
$operador =  OPERATOR::toSql(safeHTML(OPERATOR::getParam("operador")),'Text');
$idboleta = OPERATOR::toSql(safeHTML(OPERATOR::getParam("idboleta")),'Text');
$nroencuesta = OPERATOR::toSql(safeHTML(OPERATOR::getParam("nroencuesta")),'Text');

$contador = 0;

?>
    <table border="1" title="Eliminación de datos..">
        <thead>
            <tr>
                <th></th>
                <th></th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td></td>
                <td></td>
            </tr>
            <tr>
                <td></td>
                <td></td>
            </tr>
        </tbody>
    </table>        
<?php
    echo "Número de Matrícula ".$nromatricula;
    echo " - Número de Registro ".$nroregistrousr;
    echo " - Clave de Registro ".$claveregistro."<br>";
    //echo $chkconforme;
    echo "<table border=\"10\" >";
    echo "<thead>";
    echo "        <tr>";
    echo "            <th></th>";
    echo "                <th></th>";
    echo "        </tr>";
    echo "     </thead>";
    echo "    <tbody>";
    echo "        <tr>";
    echo "            <td></td>";
    echo "            <td></td>";
    echo "        </tr>";
    echo "        <tr>";
    echo "            <td></td>";
    echo "            <td></td>";
    echo "        </tr>";
    echo "    </tbody>";
    echo "</table>";
    $sw1 = 0;
if( $chkconforme == 'on' ) {
    echo "Inicio del Borrado <br>";
    echo "Modulo C - Uso y acceso de las Tecnologías de la Información TICs  --> ";
    //elimina datos de la empresa del capitulo final al inicio por tema de disñeo de base de datos
    $sql = "select * FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid = '$claveregistro'";
    //echo $sql;
    $db -> query($sql);
    echo "Contados -> ".$db->numrows()."<br>";
    if ($db->numrows() > 0) {
        $cantidad1 = $db->numrows();
        //echo $cantidad1)."<br>";
        $sql = "DELETE FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);
        $cantidad2 = mysql_affected_rows();
        echo " Borrados -> ".$cantidad2;     
        if ($cantidad2 > 0) {
            if ($cantidad1 == $cantidad2){
                echo "Correcto <br>";
                $contador = $contador + $cantidad2;
            } else {
                echo "No coindicen las cantidades..<br>";
                $sw1 = 1;
            }
        }
    }
    //1
    if ($sw1 == 0){
        echo "Modulo C - 1 Aplicaciones de Software --> ";
        $sql = "select * FROM frm1_ccap1_2aplicaciones WHERE apli_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();        
            $sql = "DELETE FROM frm1_ccap1_2aplicaciones WHERE apli_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //2
    if ($sw1 == 0){
        echo "Modulo A - 9 Formación de Activos  --> ";
        $sql = "select * FROM frm1_cap9_formacionactivosfijos WHERE foaf_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $cantidad1;
            $sql = "DELETE FROM frm1_cap9_formacionactivosfijos WHERE foaf_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //3
    if ($sw1 == 0){
        echo "Modulo A - 8 Resultados de la Gestión  --> ";
        $sql = "select * FROM frm1_cap8_resultadosgestion WHERE rege_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_cap8_resultadosgestion WHERE rege_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //4
    if ($sw1 == 0){
        echo "Modulo A - 7 Venta de Mercadería o Servicios  --> ";
        $sql = "select * FROM frm1_cap7_ventaservicios WHERE vese_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_cap7_ventaservicios WHERE vese_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //5
    if ($sw1 == 0){
        echo "Modulo A - 7 Meses de mayor Ingreso  --> ";
        $sql = "select * FROM frm1_cap7_2mesesmayorventa WHERE memv_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);   
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_cap7_2mesesmayorventa WHERE memv_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //6
    if ($sw1 == 0){
        echo "Modulo A - 6 Compra de Mercadería para Reventa  --> ";
        $sql = "select * FROM frm1_cap6_comprareventa WHERE core_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);
        echo "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_cap6_comprareventa WHERE core_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //7
    if ($sw1 == 0){
        echo "Modulo A - 5 Otros Gastos Operativos  --> ";
        $sql = "select * FROM frm1_cap5_otrosgastosoperativos WHERE otga_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_cap5_otrosgastosoperativos WHERE otga_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //8
    if ($sw1 == 0){
        echo "Modulo A - 4 Inventario de Materiales  --> ";
        $sql = "select * FROM frm1_cap4_inventariomateriales WHERE inma_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);   
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_cap4_inventariomateriales WHERE inma_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //9
    if ($sw1 == 0){
        echo "Modulo B - 3 Responsabilidad Social Empresarial  --> ";
        $sql = "select * FROM frm1_bcap3_responsabilidadsocial WHERE gece_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);   
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_bcap3_responsabilidadsocial WHERE gece_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //10
    if ($sw1 == 0){
        echo "Modulo B - 2 Sistema de Gestión de certificados  --> ";
        $sql = "select * FROM frm1_bcap2_gestioncertificados WHERE gece_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_bcap2_gestioncertificados WHERE gece_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //11
    if ($sw1 == 0){
        echo "Modulo A - 10 Capital y Patrimonio  --> ";
        $sql = "select * FROM frm1_cap10_capitalpatrimonio WHERE capa_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_cap10_capitalpatrimonio WHERE capa_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //12
    if ($sw1 == 0){
        echo "Modulo B - 1 Gestión Ambiental  --> ";
        $sql = "select * FROM frm1_bcap1_certificadosambientales WHERE ceam_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM frm1_bcap1_certificadosambientales WHERE ceam_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //13
    if ($sw1 == 0){
        echo "Modulo B - 1 Certificados  --> ";
        $sql = "select * FROM frm1_bcap1_certificados WHERE cert_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            //echo $db->numrows();
            $sql = "DELETE FROM frm1_bcap1_certificados WHERE cert_regi_uid = '$claveregistro'";
            echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //14
    if ($sw1 == 0){
        echo "Modulo A - 3 Suministros  --> ";
        $sql = "select * FROM cap3_suministros WHERE sumi_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM cap3_suministros WHERE sumi_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //15
    if ($sw1 == 0){
        echo "Modulo A - 2 Prestaciones Sociales   --> ";
        $sql = "select * FROM cap2_presta_sociales WHERE prso_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM cap2_presta_sociales WHERE prso_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
   //16 
    if ($sw1 == 0){
        echo "Modulo C - 1 Uso y Acceso de Tecnologías de la Información  --> ";
        $sql = "select * FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            //echo $db->numrows();
            $sql = "DELETE FROM frm1_ccap1_usoaccesotic WHERE usac_regi_uid = '$claveregistro'";
            echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
   //17
    if ($sw1 == 0){
         echo "Modulo A - 2 Personal Ocupado, Sueldos y Salarios  -->";
        $sql = "select * FROM cap2_personalsueldos WHERE pesu_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM cap2_personalsueldos WHERE pesu_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //18
    if ($sw1 == 0){
        echo "Modulo A - 2.2 Otros Pagos al Personal  -->";
        $sql = "select * FROM cap2_otros_pagos WHERE otpa_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM cap2_otros_pagos WHERE otpa_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //19
    if ($sw1 == 0){
        echo "Modulo A - 1 Identificación y ubicación de la empresa -->";
        $sql = "select * FROM cap1_informacion_general WHERE inge_regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM cap1_informacion_general WHERE inge_regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo "Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo "No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //20
    if ($sw1 == 0){
        echo "Modulo 0 - 1 Asignación de número de Registro  -->";
        $sql = "select * FROM sys_registros WHERE regi_uid = '$claveregistro'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            echo $db->numrows();
            $sql = "DELETE FROM sys_registros WHERE regi_uid = '$claveregistro'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo " Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo " No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    //21
    if ($sw1 == 0){
        echo "Modulo 0 - 0 Registro de Número de matrícula -->";
        $sql = "select * FROM sys_users WHERE usr_uid = '$nroregistrousr'";
        //echo $sql;
        $db -> query($sql);    
        echo  "Contados -> ".$db->numrows()."<br>";
        if ($db->numrows() > 0) {
            $cantidad1 = $db->numrows();
            //echo $db->numrows();
            $sql = "DELETE FROM sys_users WHERE usr_uid = '$nroregistrousr'";
            //echo $sql;
            $db -> query($sql);
            $cantidad2 = mysql_affected_rows();        
            echo " Borrados -> ".$cantidad2;        
            if ($cantidad2 > 0) {
                if ($cantidad1 == $cantidad2){
                    echo " Correcto <br>";
                    $contador = $contador + $cantidad2;
                } else {
                    echo " No coindicen las cantidades..<br>";
                    $sw1 = 1;
                }
            }
        }
    }
    
    if ($sw1 == 0){
        echo "Proceso de eliminación correcta";
        echo "Número de Registros Afectados en Total ---> ". $contador;
        //grabar a la tabla de control con los datos referidos             
        $sql = " INSERT INTO t_eliminados ( eliminado_usuario, eliminado_fecha, eliminado_nro_encuesta, eliminado_nro_matricula, eliminado_operador, eliminado_total_reg) "
            ." VALUES ( '".$usuarioid."', NOW(), '".$idboleta."',  '".$nromatricula."', '".$operador."', '".$contador."')";
        //echo $sql;
        $db->query($sql);                
        echo "Proceso Registrado";                                
    } else {        
        echo "Verifique manualmente Proceso de eliminación";        
        echo "Número de Registros realizados--> ". $contador;
    }
        

    /*
    
    
    frm1_ccap1_2aplicaciones
    cap1_informacion_general
    cap2_otros_pagos
    cap2_personalsueldos
    cap2_presta_sociales
    cap3_suministros
    frm1_bcap1_certificados
    frm1_bcap1_certificadosambientales
    frm1_bcap1_gestionambiental
    frm1_bcap2_2certificados
    frm1_bcap2_gestioncertificados
    frm1_bcap3_responsabilidadsocial
    frm1_cap10_capitalpatrimonio
    frm1_cap4_inventariomateriales
    frm1_cap5_otrosgastosoperativos
    frm1_cap6_comprareventa
    frm1_cap7_2mesesmayorventa
    frm1_cap7_ventaservicios
    frm1_cap8_resultadosgestion
    
     
     */    
    
}    ?>                    
       <br> Proceso Finalizado</br>
       <a href="form_ingreso.php">Otro Formulario</a>
    </body>
</html>