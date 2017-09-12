<?php
require '../conection/database/conection.php';
function listar($codigo)
{
    $conn=conectarse();
    if ($codigo){
        $sql = "select * from t_aprobacion where codigo = '$codigo'"; 
    } else {
        $sql= "select * from t_aprobacion";
    }
    $rs = mysql_query($sql):
    return $rs;
    
}


?>