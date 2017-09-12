<?php session_start(); ?>
<?php
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");
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
    <?php
    /* usuario */
    $usuario_uid = $_SESSION[SITE]["usr_uid"];
    $regisroUID = $_SESSION[SITE]["registro_uid"];
    $uidFormulario = $_SESSION[SITE]["uidtipoformulario"];
    $incidencia = 0;
    //echo $regisroUID."<br>";
    echo "Usuario<br>";
    $sql = "SELECT * FROM t_usuarios WHERE (t_usuarios.usr_tipo_usuario = '2' or t_usuarios.usr_tipo_usuario = '4')";
    $db->query( $sql );         
    if( $db->numrows() > 0 ) {
         $db->query($sql);
        echo "<select name='usuarios'>";
        echo "<option value='0'>Todas</option>";    
        while ($usuarioss = $db->next_record()) {
            echo "<option value=".$usuarioss['usr_uid'].">".$usuarioss['usr_nombres']."</option>";
        }                                            
        echo "</select>";
    } else {
         echo "No existen datos en la Tabla de usuarios";
    }
    echo "<br>"; 
    echo "<br>Año<br>";
    $sql = "SELECT * FROM adm_gestion";
    $db->query( $sql );         
    if( $db->numrows() > 0 ) {
        $db->query($sql);
        echo "<select name='gestion'>";
        echo "<option value='0'>Todos</option>";    
        while ($gestions = $db->next_record()) {
            echo "<option value=".$gestions['gest_gestion'].">".$gestions['gest_gestion']."</option>";
        }   
         echo "</select>";
    } else {
         echo "No existen datos en la Tabla de gestiones";
    }                                  
    echo "<br>";       
    echo "<br>Meses<br>";
    $sql = "SELECT * FROM adm_meses";
    $db->query( $sql );         
    if( $db->numrows() > 0 ) {
        $db->query($sql);
        echo "<select name='meses'>";
        echo "<option value='0'>Todos</option>";    
        while ($mess = $db->next_record()) {
            echo "<option value=".$mess['mes_uid'].">".$mess['mes_nombre']."</option>";
        }   
         echo "</select>";
    } else {
         echo "No existen datos en la Tabla de gestiones";
    }          
    echo "<br>";       
    echo "<br>Tipo de Formulario<br>";
    $sql = "SELECT * FROM adm_formularios";
    $db->query( $sql );         
    if( $db->numrows() > 0 ) {
        $db->query($sql);
        echo "<select name='formulario'>";
        echo "<option value='0'>Todos</option>";    
        while ($formularios = $db->next_record()) {
            echo "<option value=".$formularios['form_uid'].">".$formularios['form_description']."</option>";
        }   
         echo "</select>";
    } else {
         echo "No existen datos en la Tabla de gestiones";
    }?>
                        <br><br></br>
                        Resumen Acumulado<input type="radio" name="tdatos1" value="1" checked="checked"  /><br>
                        Según número de registro<input type="radio" name="tdatos1" value="2" /><br><br></br>                                                                           
                        <span class="bxBt">
                            <input type="submit" value="  PROCESAR  " id="sendData"  name="continuarregistro" class="buttonB" />
                            <?php 
                            if (OPERATOR::getDbValue("SELECT regi_movco FROM sys_registros WHERE regi_uid='".$regisroUID."'")=="YES") {?>   
                            <a href="index.php" class="btnS">ANTERIOR</a>
                            <?php }else{?>
                            <a href="index.php" class="btnS">ANTERIOR</a>
                            <?php } ?>
                        </span>                        
                    </fieldset>
                </form>
                <div class="clear"></div>
            
            </div>
            
        </div>
    </div>
</body>
</html>
