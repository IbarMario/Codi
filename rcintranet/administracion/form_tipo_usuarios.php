<?php
//---------------------------------------------------------------------
//----modificado en gran parte para recibir informacion del email
//----por wilfredo mendoza ------ 
//----MDPyEP - VPIMGE
//---------------------------------------------------------------------
header("Expires: Mon, 26 Jul 1997 05:00:00 GMT");
include_once("../connection/database/connection.php");
include_once("../connection/core/operator.php");

$sql = "SELECT * FROM t_tipo_usuario"; 
//echo $sql;
$db->query( $sql );
if( $db->numrows() > 0 ) {
    //se tiene numrows > 0 cuando el estado del registro es INACTIVO    
    $aUser = $db->next_record();                        
    echo $aUser['t_tipo_usuario_nombre'];    //se tiene en la 
}   
?>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

     Agregar una empresa a la base de datos<br>
     
<form name="form002" method="post" action="insertar_empresa.php">
    <br>      
 <br> 
 Nombre del tipo de Usuario <input type="text" name="nombre_t_usuario" ><br><br> 
 Fecha de registro <input type="text" name="fechareg" value="<?php  $fecha_actual=date("d/m/Y"); echo $fecha_actual; ?>" disabled="disabled" ><br><br>   
 <input type="checkbox" name="acepto" value="" onclick=""/>Estoy seguro de los cambios en la base de datos<br><br> 
 <input type="submit" name="insertar registro" value="insertar registro"><br>
</form>
    </body>
</html>
