<?php
session_start();
include('db.php');
$user=$_GET['user'];
//include('acceso_db.php');
if(isset($_POST['acceder'])) { // comprobamos que se hayan enviado los datos del formulario
    // comprobamos que los campos usuarios_nombre y usuario_clave no estén vacíos
    if(empty($_POST['usuario_nombre']) || empty($_POST['usuario_clave'])) {
        echo "El usuario o la contraseña no han sido ingresados. <a href='javascript:history.back();'>Reintentar</a>";
    } else {
        // "limpiamos" los campos del formulario de posibles códigos maliciosos
        $usuario_nombre = mysql_real_escape_string($_POST['usuario_nombre']);
        $usuario_clave = mysql_real_escape_string($_POST['usuario_clave']);           
        $usuario_clave = md5($usuario_clave);
        $usuario_clave = $usuario_clave;
        //echo $usuario_nombre;
        //echo $usuario_clave;
        // comprobamos que los datos ingresados en el formulario coincidan con los de la BD
        $sql = mysql_query("SELECT usr_login, usr_pass, usr_uid FROM t_usuarios WHERE usr_login='".$usuario_nombre."' AND usr_pass='".$usuario_clave."' AND usr_status='ACTIVE'");
        //echo $sql;
        if($row = mysql_fetch_array($sql)) {
            ////$_SESSION['usuario_id'] = $row['usuario_id'];        // creamos la sesion "usuario_id" y le asignamos como valor el campo usuario_id
            $_SESSION['usuario_nombre'] = $row["usuario_nombre"];    // creamos la sesion "usuario_nombre" y le asignamos como valor el campo usuario_nombre
            $idusuario = $row["usr_uid"];
            echo "<input type='hidden' name='idusuario' value='".$row["usr_uid"]."'/>";             
            //header("Location: index.php");
            //echo '<script type="text/javascript">window.location.href="frmReporte.php";</script>';
            echo '<script type="text/javascript">window.location.href="frmVerificacion.php";</script>';
        }else {
?>				
           <script type="text/javascript">
              alert("Usuario y contraseña incorrecto..!!! \n Vuelva a intentarlo");
           </script>
           <script type="text/javascript">window.location.href="login2.php";</script>
           <script type="text/javascript">window.close();</script>
           <!--Error, <a href="index.php">Reintentar</a>-->
<?php
       }
    }
}else {
    //header("Location: index.php");
        echo '<script type="text/javascript">window.location.href="login2.php";</script>';
    }
?> 
<head>
    <title>MDPyEP</title>
    <meta http-equiv="content-type" content="text/html; charset=utf-8" />
    <meta name="description" content="" />
    <meta name="keywords" content="" />
</head>