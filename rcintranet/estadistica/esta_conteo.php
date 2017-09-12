<?php session_start();
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
/* usuario */
    $usuario_uid = $_SESSION[SITE]["usr_uid"];
    $regisroUID = $_SESSION[SITE]["registro_uid"];
    $uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
    $incidencia = 0;
    $contador=0;    
//recepción de datos de entrada incluyendo la matrícula de comercio
$usuario = OPERATOR::toSql(safeHTML(OPERATOR::getParam("usuarios")),'Text');
//$usuario1 = (int)$usuario;
$gestion = OPERATOR::toSql(safeHTML(OPERATOR::getParam("gestion")),'Text');
//$gestion1 = (int)$gestion;
$mes = OPERATOR::toSql(safeHTML(OPERATOR::getParam("meses")),'Text');
//$mes1 = (int)$mes;
$formulario = OPERATOR::toSql(safeHTML(OPERATOR::getParam("formulario")),'Text');
$tdatos1 = OPERATOR::toSql(safeHTML(OPERATOR::getParam("tdatos1")),'Text');
$total=0;
//$formulario1 = (int)$formulario;
/*
echo "us".$usuario1;
echo "gest".$gestion1;
echo "mes".$mes1;
echo "form".$formulario1;
echo "tdatos1".$tdatos1;*/
$condicion = '';
if ($usuario > 0) {
    //echo 'Mayor a cero';
    if ($condicion == '') {
      //  echo 'Con nueva condicion ';
        $condicion = ' WHERE usr_usuario_id = '.$usuario;
    } else {
        //echo 'Con condicion antigua';
        $condicion = $condicion .' AND usr_usuario_id = '.$usuario;
    }
}
//echo 'Cond1'.$condicion;
if ($gestion > 0) {
  //  echo 'Mayor a cero';
    if ($condicion == '') {
    //    echo 'Con nueva condicion ';
        $condicion = ' WHERE  year(usr_datecreate) = '.$gestion;
    } else {
      //  echo 'Con condicion antigua';
        $condicion = $condicion .' AND year(usr_datecreate) = '.$gestion;
    }
}
//echo 'Cond2'.$condicion;

if ($mes > 0) {
  //  echo 'Mayor a cero';
    if ($condicion == '') {
    //    echo 'Con nueva condicion ';
        $condicion = ' WHERE MONTH(usr_datecreate) = '.$mes;
    } else {
      //  echo 'Con condicion antigua';
        $condicion = $condicion .' AND MONTH(usr_datecreate) = '.$mes;
    }
}
//echo 'Cond3'.$condicion;
if ($formulario > 0) {
  //  echo 'Mayor a cero';
    if ($condicion == '') {
    //    echo 'Con nueva condicion ';
        $condicion = ' WHERE usr_form_uid = '.$formulario;
    } else {
      //  echo 'Con condicion antigua';
        $condicion = $condicion .' AND  usr_form_uid = '.$formulario;
    }
}
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
    <meta name="language" content="es" />    
    <title>Resumenes de los Formularios de Encuesta Comercio y Servicios</title>
    <meta name="description" content="Inicio" />
    <meta name="keywords" content="Inicio" />
    <link href="../css/layout.css" rel="stylesheet" type="text/css" />    
    <link rel="shortcut icon" href="lib/favicon.ico"   type="image/x-icon"/>    
    <script type="text/javascript" src="../js/jquery.min.js"></script>   
    <script type="text/javascript" src="js/bol1.js"></script>    
</head>
<body>
       <!-- begin body -->
    <div id="wrpB">
        <div id="areaprint">
            <div class="headerB">
                <a href="#" class="logo"><img src="<?php echo $domain; ?>/lib/logo_b.jpg" alt="Ministerio" width="298" height="97" /></a>    </div>
                <div class="contentB">
                    <p>                        
                        ENCUESTA ANUAL DE UNIDADES PRODUCTIVAS<br>
                        Proceso que permite el obtener la estadistica de datos sobre la transcripcion.<br>
                    </p>                                        
                    <form class="formA validable" action="esta_conteo.php" method="post" style="text-align: center;">
                    <fieldset>                        
                        <table class="fOpt">
                                                   
<?php 
if ($tdatos1==1){    //se hace en caso de ser el acumulado
 ?>
                        <thead>
                            <tr>
                                <th colspan="5">Número de encuestas por usuario</th>
                            </tr>
                        </thead>
                   <tbody>     
                        <tr>        
				<td><span class="bold">Nro.</span> 
                                <label class="labB"></label>
                            </td>                
                            <td><span class="bold">Nombres</span> 
                                    <label class="labB"></label>
                            </td>
                                <td><span class="bold">Paterno</span> 
                                    <label class="labB"></label>
                                </td>
                                <td><span class="bold">Materno</span>
                                    <label class="labB"></label>
                                </td>
                                <td><span class="bold">Cantidad</span>
                                    <label class="labB"></label>
                                </td>
                            </tr>                                                                                 
<?php
    if ($condicion == ''){
      //  echo 'No vacio';
        $sql = "SELECT usr_usuario_id, usr_nombres, usr_paterno, count(*) AS cuantos from sys_users";
    } else {
      //  echo 'vacio';
        $sql = "SELECT usr_usuario_id, usr_nombres, usr_paterno, count(*) AS cuantos from sys_users ". $condicion." ";
    }
//    echo $sql;    
    $sql = $sql." GROUP BY usr_usuario_id;";
//    echo $sql;
    $db->query( $sql );         
    if( $db->numrows() > 0 ) {
        $db->query($sql);
        while ($resultado = $db->next_record()) {
            $total = $total+$resultado['cuantos'];
	     $contador=$contador +1;
            if ($resultado['cuantos']>0){
                echo "<tr><td>".$contador."</td><td>".$resultado['usr_nombres']."</td><td>".$resultado['usr_paterno']."</td><td>".$resultado['usr_paterno']."</td><td>". $resultado['cuantos']."</td></tr>";                                
            }            
        }                                                   
        
        ?>
                                <tr>                        
                                <td><span class="bold">Total:</span>
                                    <label class="labB"></label>
                                </td>
                                <td><span class="bold"></span>
                                    <label class="labB"></label>
                                </td>
				    <td><span class="bold"></span>
                                    <label class="labB"></label>
                                </td>

                                 <td><span class="bold"></span>
                                    <label class="labB"></label>
                                </td>
                                 <td><span class="bold"></span><?php echo $total; ?>
                                    <label class="labB"></label>
                                </td>
                            </tr>                    
                        </tbody>
                  </table>
                       
        <?php 
        
        
    } else {
         echo "No existen resultados para mostrar";
    }         
    
} else { // se hace ene lcaso de se a detalle
    ?>
                       <thead>
                            <tr>
                                <th colspan="6">Número de encuestas por usuario</th>
                            </tr>
                        </thead>
                   <tbody> 
                           <tr>
				<td><span class="bold">Nro.</span> 
                                <label class="labB"></label>
                            </td>                
                            <td><span class="bold">Nombres</span> 
                                    <label class="labB"></label>
                            </td>
                                <td><span class="bold">Paterno</span> 
                                    <label class="labB"></label>
                                </td>
                                <td><span class="bold">Materno</span>
                                    <label class="labB"></label>
                                </td>
                                <td><span class="bold">Id. Boleta</span>
                                    <label class="labB"></label>
                                </td>
                                <td><span class="bold">Nro. Matricula</span>
                                    <label class="labB"></label>
                                </td>                                                       
                            </tr>                          
    <?php
            if ($condicion == ''){
            //  echo 'No vacio';
            $sql = "SELECT usr_usuario_id, usr_nombres, usr_paterno, usr_id_boleta, usr_login from sys_users ";
            } else {
            //  echo 'vacio';
            $sql = "SELECT usr_usuario_id, usr_nombres, usr_paterno, usr_id_boleta, usr_login from sys_users ". $condicion." ";
            }
            //    echo $sql;    
            $sql = $sql." ORDER BY usr_id_boleta;";
                                                                              
            //echo $sql;
            $db->query( $sql );         
            //echo $db->numrows();
            if( $db->numrows() > 0 ) {
                $db->query($sql);
                while ($resultado = $db->next_record()) {
                    $total = $total+1;
                    $contador=$contador +1;
                    if ($db->numrows()>0){
                        echo "<tr><td>".$contador."</td><td>".$resultado['usr_nombres']."</td><td>".$resultado['usr_paterno']."</td><td>".$resultado['usr_paterno']."</td><td>". $resultado['usr_id_boleta']."</td><td>". $resultado['usr_login']."</td></tr>";
                    }            
                }                                                   
            } else {
            echo "No existen resultados para mostrar";
        } 
    }
    echo "<br>";         
    ?>                                                             
                        </tbody>
                  </table>                        
                        <span class="bxBt">                            
                            <a href="index.php" class="btnS"> PRINCIPAL > </a>
                            <a href="conteo_mdpyep.php" class="btnS">ANTERIOR</a>
                            
                        </span>                        
                    </fieldset>
                </form>
                <div class="clear"></div>
            </div>
        </div>
    </div>
</body>
</html>
