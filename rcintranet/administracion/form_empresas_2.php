
<!DOCTYPE html>
<html>
    <head>
        <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
        <title></title>
    </head>
    <body>

     Agregar una empresa a la base de datos<br>
     
<form name="form002" method="post" action="insertar_empresa.php">
    <br>
     Departamento:
     <?php
        // put your code here
 $link = pg_connect("host=localhost port=5432 dbname=vpimge user=postgres password=123456");
 $stat = pg_connection_status($link); 
 if ($stat === 0) {
    echo 'Conexión establecida'; 
         $query = "SELECT * FROM soya.tbl_departamentos";
         $query = pg_query($query);
    echo "<select name='depto'>";
    while($row = pg_fetch_array($query,NULL,PGSQL_ASSOC))
    {           
        echo "<option value=".$row['id_departamento'].">".$row['nombre_departamento']."</option>";  
    }
    echo "</select>";
    echo "<br>";

 }
   ?>     
 <br>
 Codigo de la Empresa <input type="text" name="nombre"><br><br>
 Nombre de la Empresa <input type="text" name="nombre"><br><br>
 Dirección <input type="text" name="direccion"><br><br>
 Teléfono <input type="text" name="telefono"><br><br>
 Fax <input type="text" name="fax"><br><br>
 Nombre del responsable <input type="text" name="responsable"><br><br>  
 Fecha de registro <input type="text" name="fechareg" value="<?php  $fecha_actual=date("d/m/Y"); echo $fecha_actual; ?>" disabled="disabled" ><br><br>   
 <input type="checkbox" name="acepto" value="" onclick=""/>Estoy seguro de los cambios en la base de datos<br><br> 
 <input type="submit" name="insertar registro" value="insertar registro"><br>
</form>
    </body>
</html>
